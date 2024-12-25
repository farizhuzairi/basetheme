@props([
    'icon' => null,
    'url' => '#',
    'text' => 'Tagable Text',
])
<a {{
    $attributes->merge([
        'class' => $attributes->prepends('text-[0.80em] px-2 py-0 rounded'),
        'href' => $url
    ])
}}>
@if(! empty($icon))<span class="{{ $icon }} me-0.5"></span>@endif
{{ $text }}
</a>