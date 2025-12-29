<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Mail\LeadStatusUpdated;
use Illuminate\Support\Facades\Mail;
use App\Models\LeadHistory;

class LeadController extends Controller
{
    // List leads with search and filter
    public function index(Request $request)
    {
        $query = Lead::query();

        // Role-based: users see only their leads
        if (!auth()->user()->isAdmin()) {
            $query->where('user_id', auth()->id());
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $leads = $query->orderBy('id', 'desc')
                       ->paginate(10)
                       ->appends($request->query());

        return view('leads.index', compact('leads'));
    }

    // Show create form
    public function create()
    {
        return view('leads.create');
    }

    // Store new lead
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'   => 'required|max:191',
            'email'  => 'required|email|unique:leads,email',
            'phone'  => 'required|max:15',
            'status' => 'required|in:New,In Progress,Closed',
        ]);

        $data['date_added'] = now();
        $data['last_updated'] = now();
        $data['user_id'] = auth()->id(); // assign owner

        Lead::create($data);

        return redirect()->route('leads.index')
            ->with('success', 'Lead created successfully.');
    }

    // Show edit form
    public function edit(Lead $lead)
    {
        $this->authorizeLead($lead);
        return view('leads.edit', compact('lead'));
    }

    // Update lead
    public function update(Request $request, Lead $lead)
    {
        $this->authorizeLead($lead);

        $oldStatus = $lead->status;

        $data = $request->validate([
            'name'   => 'required|max:191',
            'email'  => 'required|email|unique:leads,email,' . $lead->id,
            'phone'  => 'required|max:15',
            'status' => 'required|in:New,In Progress,Closed',
        ]);

        $data['last_updated'] = now();

        $lead->update($data);

        if ($oldStatus !== $lead->status) {

            // Log history
            LeadHistory::create([
                'lead_id'    => $lead->id,
                'user_id'    => auth()->id(),
                'old_status' => $oldStatus,
                'new_status' => $lead->status,
                'changed_at' => now(),
            ]);

            // Send email
            Mail::to($lead->email)->send(new LeadStatusUpdated($lead));
        }

        return redirect()->route('leads.index')
            ->with('success', 'Lead updated successfully.');
    }



    // Delete lead
    public function destroy(Lead $lead)
    {
        $this->authorizeLead($lead);

        $lead->delete();

        return redirect()->route('leads.index')
            ->with('success', 'Lead deleted successfully.');
    }

   
    private function authorizeLead(Lead $lead)
    {
        if (!auth()->user()->isAdmin() && $lead->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }

    //  Import leads from Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048',
        ]);

        $spreadsheet = IOFactory::load($request->file('file')->getPathname());
        $rows = $spreadsheet->getActiveSheet()->toArray();

        $success = 0;
        $failed = [];

        foreach (array_slice($rows, 1) as $index => $row) {
            try {
                [$name, $email, $phone, $status] = $row;

                $data = validator([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'status' => $status,
                ], [
                    'name' => 'required|max:191',
                    'email' => 'required|email|unique:leads,email',
                    'phone' => 'required|max:15',
                    'status' => 'required|in:New,In Progress,Closed',
                ])->validate();

                Lead::create([
                    ...$data,
                    'date_added' => now(),
                    'last_updated' => now(),
                    'user_id' => auth()->id(),
                ]);

                $success++;
            } catch (\Throwable $e) {
                $failed[] = [
                    'row' => $index + 2,
                    'error' => $e->getMessage(),
                ];
            }
        }

        return back()->with('success', "$success leads imported successfully.")
                     ->with('failed', $failed);
    }

    //  Export leads to Excel
    public function export()
    {
        $query = Lead::query();

        // Role-based: users export only their leads
        if (!auth()->user()->isAdmin()) {
            $query->where('user_id', auth()->id());
        }

        $leads = $query->orderBy('id')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->fromArray(['Name','Email','Phone','Status','Date Added'], null, 'A1');

        $row = 2;
        foreach ($leads as $lead) {
            $sheet->fromArray([
                $lead->name,
                $lead->email,
                $lead->phone,
                $lead->status,
                $lead->date_added,
            ], null, 'A' . $row++);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'leads.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function history(Lead $lead)
    {
        $this->authorizeLead($lead);

        $histories = $lead->histories()
                        ->with('user')
                        ->orderBy('changed_at', 'desc')
                        ->get();

        return view('leads.history', compact('lead', 'histories'));
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return back()->with('error', 'No leads selected.');
        }

        $query = Lead::whereIn('id', $ids);

        if (!auth()->user()->isAdmin()) {
            $query->where('user_id', auth()->id());
        }

        $count = $query->count();
        $query->delete();

        return back()->with('success', "$count leads deleted successfully.");
    }


}
