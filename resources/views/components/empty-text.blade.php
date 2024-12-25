@props([
    'text' => null
])
@if(! empty($text))
<p {{ $attributes->merge(['class' => $attributes->prepends('text-c-light-thick')]) }}>{{ $text }}</p>
@endif