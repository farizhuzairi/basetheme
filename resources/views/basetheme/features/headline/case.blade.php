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
    <h3 class="font-title font-semibold border-b border-c-dark-thin text-lg text-c-light leading-5">
        <a href="{{ $url }}" class="block pb-1">
            @if($icon)<span class="{{ $icon }}"></span>@endif
            {{ $subject }}
            @if($introduction)
            <p class="text-xs font-light">{{ $introduction }}</p>
            @endif
        </a>
    </h3>
    <a href="" class="flex items-center text-xl hover:text-2xl transition-all"><span class="hascha-right"></span></a>
</div>