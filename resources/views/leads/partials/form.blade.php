<div class="space-y-6">
    <div class="space-y-2 group">
        <label class="form-label !text-white/40 group-focus-within:!text-brand-400 transition-colors">Lead Name</label>
        <div class="relative">
            <input type="text" name="name" class="form-input !pl-4"
                placeholder="Full Name"
                value="{{ old('name', $lead->name ?? '') }}" required>
            @error('name') 
                <div class="mt-2 text-[10px] font-bold uppercase tracking-wider text-rose-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="space-y-2 group">
        <label class="form-label !text-white/40 group-focus-within:!text-accent-cyan transition-colors">Email Address</label>
        <div class="relative">
            <input type="email" name="email" class="form-input !pl-4"
                placeholder="email@example.com"
                value="{{ old('email', $lead->email ?? '') }}" required>
            @error('email') 
                <div class="mt-2 text-[10px] font-bold uppercase tracking-wider text-rose-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="space-y-2 group">
        <label class="form-label !text-white/40 group-focus-within:!text-accent-indigo transition-colors">Phone Number</label>
        <div class="relative">
            <input type="text" name="phone" class="form-input !pl-4"
                placeholder="0000000000"
                value="{{ old('phone', $lead->phone ?? '') }}" required>
            @error('phone') 
                <div class="mt-2 text-[10px] font-bold uppercase tracking-wider text-rose-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="space-y-2 group">
        <label class="form-label !text-white/40 group-focus-within:!text-brand-400 transition-colors">Lead Status</label>
        <select name="status" class="form-select" required>
            @foreach(['New','In Progress','Closed'] as $status)
                <option value="{{ $status }}"
                    {{ old('status', $lead->status ?? 'New') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </div>
</div>
