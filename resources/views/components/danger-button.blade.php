<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-danger shadow-sm focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
