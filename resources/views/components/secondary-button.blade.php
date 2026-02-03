<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary shadow-sm focus:outline-none focus:ring-2 focus:ring-ink-700 focus:ring-offset-2 disabled:opacity-50']) }}>
    {{ $slot }}
</button>
