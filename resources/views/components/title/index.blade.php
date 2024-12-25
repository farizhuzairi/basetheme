@props([
    'title',
    'label' => null,
    'description' => null,
    'withBorder' => true
])
@php
$titleCss = "";
if($withBorder) {
    $titleCss .= " border-b border-c-border dark:border-c-border-deep";
}
@endphp
<div {{ $attributes->merge(['class' => $attributes->prepends('mb-3')]) }}>
    <h1 {{ $title->attributes->merge(['class' => $attributes->prepends('font-title font-semibold text-lg md:text-lg lg:text-xl leading-5' . $titleCss)]) }}>
        {{ $title }}
        @if(! empty($label))<span class="text-sm font-title font-light">{{ $label }}</span>@endif
    </h1>
    @if(! empty($description))
    <div {{ $description->attributes->merge(['class' => $attributes->prepends('text-c-dark-thin dark:text-c-light-thick tracking-wide font-lato')]) }}>
        {{ $description }}
    </div>
    @endif
</div>