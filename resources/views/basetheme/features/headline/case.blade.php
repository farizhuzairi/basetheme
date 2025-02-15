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
    <h3 class="font-title font-semibold border border-c-dark-thin text-lg text-c-light bg-c-theme hover:bg-c-dark-thin transition-all rounded leading-5">
        <a href="{{ $url }}" class="block ps-3 pe-5 py-2">
            @if($icon)<span class="{{ $icon }}"></span>@endif
            {{ $subject }}
            @if($introduction)
            <p class="text-xs font-light">{{ $introduction }}</p>
            @endif
        </a>
    </h3>
    <a href="" class="flex items-center text-xl hover:text-2xl transition-all"><span class="hascha-right"></span></a>
</div>