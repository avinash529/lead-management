<div class="space-y-2">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-input"
        value="{{ old('name', $lead->name ?? '') }}" required>
    @error('name') <small class="text-sm text-rose-600">{{ $message }}</small> @enderror
</div>

<div class="space-y-2">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-input"
        value="{{ old('email', $lead->email ?? '') }}" required>
    @error('email') <small class="text-sm text-rose-600">{{ $message }}</small> @enderror
</div>

<div class="space-y-2">
    <label class="form-label">Phone</label>
    <input type="text" name="phone" class="form-input"
        value="{{ old('phone', $lead->phone ?? '') }}" required>
    @error('phone') <small class="text-sm text-rose-600">{{ $message }}</small> @enderror
</div>

<div class="space-y-2">
    <label class="form-label">Status</label>
    <select name="status" class="form-select" required>
        @foreach(['New','In Progress','Closed'] as $status)
            <option value="{{ $status }}"
                {{ old('status', $lead->status ?? 'New') == $status ? 'selected' : '' }}>
                {{ $status }}
            </option>
        @endforeach
    </select>
</div>
