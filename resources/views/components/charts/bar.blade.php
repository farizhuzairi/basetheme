@props([
    'label',
    'pts',
    'wpts'
])
<div {{ $attributes->merge(['class' => $attributes->prepends('h-6 w-full bg-c-light-thin relative text-sm font-semibold')]) }}>
    <div class="absolute text-c-dark px-3 w-full h-full">
        <div class="h-full flex justify-between gap-1 items-center">
            <div class="bg-c-light-thin/50 rounded px-1">
                <span class="hascha-bar_chart"></span>
                {{ $label }}
            </div>
            <div class="bg-c-light-thin/50 rounded px-1">{{ $pts . '%' }}</div>
        </div>
    </div>
    <div class="h-full border-s border-primary shadow bg-gradient-to-r from-success/50 via-success/75 to-success {{ $wpts }}"></div>
</div>