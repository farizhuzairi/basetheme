@props([
    'url' => '#',
    'icon' => 'hascha-cheveron-outline-right',
    'details' => null,
    'theme' => null,
    'subject',
])
@php
switch($theme) {
    case 'primary':
        $css = " text-primary";
        break;
    case 'success':
        $css = " text-success";
        break;
    case 'info':
        $css = " text-info";
        break;
    case 'warning':
        $css = " text-warning";
        break;
    case 'danger':
        $css = " text-danger";
        break;
    case 'theme':
    default:
        $css = " text-c-theme";
        break;
}
@endphp
<div {{ $attributes }}>
    <h5 class="text-lg leading-5">
        <a href="{{ $url }}" class="{{ 'block font-title font-medium hover:translate-x-1 transition-all' . $css }}">
            @if($icon)<span class="{{ $icon }}"></span>@endif
            {{ $subject }}
        </a>
    </h5>
    @if($details)
    <p {{
        $details->attributes->merge(['class' => $attributes->prepends('text-sm font-light')])
    }}>
        {{ $details }}
    </p>
    @endif
</div>