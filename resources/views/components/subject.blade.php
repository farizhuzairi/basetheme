@props([
    'subject' => null,
    'introduction' => null,
    'fontSize' => null
])
@php
switch($fontSize) {
    case 'xs':
        $fontSizeCss = "text-xs";
        break;
    case 'sm':
        $fontSizeCss = "text-sm";
        break;
    case 'base':
        $fontSizeCss = "text-base";
        break;
    case 'lg':
        $fontSizeCss = "text-lg";
        break;
    case 'xl':
        $fontSizeCss = "text-xl";
        break;
    default:
        $fontSizeCss = "";
        break;
}
@endphp
@if(! empty($subject) || ! empty($introduction))
<div {{ $attributes->merge(['class' => 'mb-3']) }}>
@if(! empty($subject))
<h3 class="font-sub-title font-medium text-c-dark-thin dark:text-c-light {{ $fontSizeCss }}">{{ $subject }}</h3>
@endif
@if(! empty($introduction))
<p class="font-light text-c-dark dark:text-c-light-thick">{{ $introduction }}</p>
@endif
</div>
@endif