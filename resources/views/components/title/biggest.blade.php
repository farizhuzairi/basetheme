@props([
    'title',
    'headText' => null,
    'description' => null
])
<div {{ $attributes->merge(['class' => $attributes->prepends('mb-3' . empty($headText) && empty($title) && empty($description) ? ' hidden' : '')]) }}>
    @if(! empty($headText))<div class=""><span class="text-base font-title">{{ $headText }}</span></div>@endif
    <h2 class="font-title font-semibold text-3xl md:text-4xl lg:text-5xl leading-7 md:leading-9 lg:leading-10">{{ $title }}</h2>
    @if(! empty($description))<p class="font-light text-c-dark dark:text-c-light-thick">{{ $description }}</p>@endif
</div>