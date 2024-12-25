@props([
    'src' => asset('images/base-layout/banner1.png'),
    'alt' => 'Image',
])
<div {{ $attributtes->merge(['class' => $attributes->prepends('base-flex-thin')]) }}>
    <img src="{{ $asset }}" alt="{{ $alt }}" class="rounded">
    <p class="font-light font-sans">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quaerat incidunt quo.
    </p>
</div>