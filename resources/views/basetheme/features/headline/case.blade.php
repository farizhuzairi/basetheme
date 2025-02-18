@props(__props_class([
    'icon' => null,
    'url' => '#'
]))
<div {{
        $attributes->merge(['class' => $attributes->prepends('flex justify-between gap-3')])
        ->merge([
            'class' => $class
        ])
    }}>
    <a href="{{ $url }}" class="border-b border-c-light-thick">
        <h3 class="font-title font-semibold pb-1 text-lg leading-4">
            @if($icon)<span class="{{ $icon }}"></span>@endif
            {{ $subject }}
        </h3>
        @if($introduction)
        <p class="text-xs">{{ $introduction }}</p>
        @endif
    </a>
    <a href="" class="flex items-center text-xl hover:text-2xl transition-all"><span class="hascha-right"></span></a>
</div>