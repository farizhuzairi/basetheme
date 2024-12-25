@props([
    'title' => null,
    'url' => '#',
    'info' => null,
    'counter' => 0,
    'icon' => null,
    'newCounter' => 0,
])
<div {{
    $attributes->merge(['class' => $attributes->prepends('bg-white shadow hover:shadow-md rounded')])
}}>
    <div class="relative" x-data="{ tabInfo: false }">

        <div class="flex flex-col z-index min-h-[60px] cursor-pointer" x-on:click="window.location.href='{{ $url }}'">
            @if(! empty($title))
            <h3 class="font-sub-title leading-4 border-b border-c-border flex justify-between px-3 pt-3 pb-1">
                <span class="{{ $icon }} text-c-light-thick"></span>
                {{ $title }}
            </h3>
            @endif
            <div class="p-3 mt-auto">
                <span class="inline-block text-2xl">{{ $counter }}</span>
                @if(! empty($label))
                <span class="inline-block text-sm font-light">{{ $label }}</span>
                @endif
                @if(! empty($info))
                <x-base::buttons.reset x-on:click="tabInfo = ! tabInfo" x-on:mouseover="tabInfo = true" x-on:mouseleave="tabInfo = false"><span class="hascha-information-outline text-c-light text-sm inline-block"></span></x-base::buttons.reset>
                @endif
            </div>
        </div>
        @if(! empty($info))
        <div x-show="tabInfo" x-cloak x-transition x-on:click.away="tabInfo = false" class="absolute w-full bg-c-theme shadow border-t border-c-border-thin text-sm text-c-light-thick font-sans font-light leading-4 px-3 py-2 z-30">
            {{ $info }}
        </div>
        @endif

    </div>
</div>