<button {{
    $attributes->merge([
        'class' => $attributes->prepends('ring-0 active:ring-0 outline-none active:outline-none text-[0.85em] transition-all'),
        'type' => $btnType
    ])
}}><span class="{{ $icon }} text-[1.3em]"></span>{{ $slot }}</button>