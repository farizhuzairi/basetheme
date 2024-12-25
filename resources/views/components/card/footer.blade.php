@props([
    'content' => null,
    'right' => false,
])
<div {{ $attributes->merge(['class' => $attributes->prepends('card-footer base-flex-space')]) }}>
@if($content)<div>{{ $content }}</div>@endif
<div class="{{ $right ? 'flex flex-wrap justify-end gap-1 items-center' : '' }}">{{ $slot }}</div>
</div>