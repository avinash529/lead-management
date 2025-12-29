<?php

namespace App\Http\Controllers;

use App\Models\Lead;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Lead::count();
        $new = Lead::where('status', 'New')->count();
        $inProgress = Lead::where('status', 'In Progress')->count();
        $closed = Lead::where('status', 'Closed')->count();

        $recentLeads = Lead::orderBy('id', 'desc')->take(5)->get();

        // Chart data
        $chartLabels = ['New', 'In Progress', 'Closed'];
        $chartData = [$new, $inProgress, $closed];

        return view('dashboard', compact(
            'total', 'new', 'inProgress', 'closed', 'recentLeads',
            'chartLabels', 'chartData'
        ));
    }
}
