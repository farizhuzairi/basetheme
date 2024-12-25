<h1 class="font-title">
<a href="{{ $url }}" class="flex flex-nowrap gap-2 items-center font-semibold text-[1.1em] nav-brand">
    @if($showLogo)
    <livewire:brand.logo :logo="$logo"/>
    @elseif($withIcon && ! empty($icon))
    <livewire:brand.icon :icon="$icon"/>
    @endif
    <livewire:brand.name :name="$brandMenu"/>
</a>
</h1>