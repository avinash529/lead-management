<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary !px-8 !py-3 active:scale-95 transition-all disabled:opacity-50']) }}>
    {{ $slot }}
</button>
