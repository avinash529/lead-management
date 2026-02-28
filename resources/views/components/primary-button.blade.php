<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary !px-8 !py-3 shadow-lg shadow-brand-500/20 active:scale-95 transition-all']) }}>
    {{ $slot }}
</button>
