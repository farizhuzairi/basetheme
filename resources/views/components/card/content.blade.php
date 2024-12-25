@props([
    'contents' => []
])
<div {{ $attributes->merge(['class' => $attributes->prepends('card-column base-flex-spacer-max')]) }}>
<x-base::_contents :$contents/>
</div>