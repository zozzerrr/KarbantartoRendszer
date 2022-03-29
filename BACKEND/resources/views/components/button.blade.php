<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-3 btn btn-primary']) }}>
    {{ $slot }}
</button>
