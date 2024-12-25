<header {{ $attributes->merge(['class' => $attributes->prepends($theme === 'panel' ? 'fixed top-0 right-0 w-full z-30' : '')]) }}>

@if($theme !== 'panel')
<x-base-component::top-nav
id="topNav"
:class="basetheme()->btheme('bg-top-bar-style')"
>
@php
foreach(__featureables(\Hascha\BaseTheme\Facade\Features\Content::class, [], 'topHeader') as $_key => $i) {
    echo e($i);
}
@endphp
</x-base-component::top-nav>
@endif

<div class="{{ basetheme()->btheme('bg-nav-style') }} select-none">
<div id="navigation" data-jump="{{ basetheme()->btheme('bg-nav-style') }} fixed top-0 z-50 w-full">
    <div class="base-container">
        <x-base-component::navigation>
            @if($theme === 'panel')
            <a href="{{ config('app.url') }}" class="font-title font-medium"><livewire:brand.logo/></a>
            @php
            foreach(__featureables(\Hascha\BaseTheme\Facade\Features\Content::class, ['navMenu'], 'header') as $_key => $i) {
                echo e($i);
            }
            @endphp
            <div class="hidden md:flex md:flex-wrap gap-2 items-center">
                @php
                foreach(__featureables(\Hascha\BaseTheme\Facade\Features\Content::class, ['headline', 'tagables'], 'header') as $_key => $i) {
                    echo e($i);
                }
                @endphp
            </div>
            @endif
        </x-base-component::navigation>
    </div>
</div>
@if($theme !== 'panel')
<x-base-component::sub-nav
id="subNav"
:class="'base-padding relative z-40'"
/>
<livewire:menu-hero :key="liveKey($theme, 'navigation_menu_hero_')"/>
@endif
</div>

</header>