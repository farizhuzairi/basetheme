@props([
    'url' => '#',
    'icon' => 'hascha-cheveron-right',
    'theme' => null,
    'withTranslate' => false
])
@php
switch($theme) {
    case 'primary':
        $css = " bg-primary text-c-light-thin";
        break;
    case 'success':
        $css = " bg-success text-c-light-thin";
        break;
    case 'info':
        $css = " bg-info text-c-light-thin";
        break;
    case 'warning':
        $css = " bg-warning text-c-light-thin";
        break;
    case 'danger':
        $css = " bg-danger text-c-light-thin";
        break;
    case 'theme':
    default:
        $css = " bg-c-theme text-c-light";
        break;
}

if($withTranslate) {
    $css .= " hover:translate-x-0.5";
}
@endphp
<a {{
    $attributes->merge(['class' => $attributes->prepends('flex justify-between gap-1 items-center font-sub-menu px-3 py-2 rounded transition-all ' . $css)])
    ->merge([
        'href' => $url
    ])
}}>
    {{ $slot }}
    @if($icon)<span class="{{ $icon }}"></span>@endif
</a>