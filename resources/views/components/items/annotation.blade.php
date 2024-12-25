@props([
    'url' => '#',
    'icon' => 'hascha-right',
])
<a {{
    $attributes->merge(['class' => $attributes->prepends('flex justify-between gap-1 items-center border border-c-theme px-3 py-2 rounded hover:px-5 transition-all')])
    ->merge([
        'href' => $url
    ])
}}>
    {{ $slot }}
    @if($icon)<span class="{{ $icon }}"></span>@endif
</a>