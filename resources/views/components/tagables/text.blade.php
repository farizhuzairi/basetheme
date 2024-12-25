@props([
    'icon' => null,
    'text' => 'Tagable Text',
])
<span {{
    $attributes->merge([
        'class' => $attributes->prepends('text-[0.80em]')
    ])
}}>
@if(! empty($icon))<span class="{{ $icon }} me-0.5"></span>@endif
{{ $text }}
</span>