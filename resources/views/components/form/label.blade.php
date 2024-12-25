@props([
    'label',
])
<label {{ $attributes->merge(['class' => $attributes->prepends('font-primary')]) }}>
    <span class="text-c-text-thin">{{ $label }}</span>
    {{ $slot }}
</label>