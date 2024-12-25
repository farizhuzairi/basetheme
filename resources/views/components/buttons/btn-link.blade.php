<a {{
    $attributes->merge([
        'class' => $attributes->prepends('font-sub-menu ' . $activeCss),
        'href' => $url ?? '#'
    ])
}}>
@if(!empty($icon))
<span class="{{ $icon }}"></span>
@endif
{{ $text }}
</a>