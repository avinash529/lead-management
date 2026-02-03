<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary shadow-sm focus:outline-none focus:ring-2 focus:ring-ink-700 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
