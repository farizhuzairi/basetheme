<div {{ $attributes }}>
    @if($container)
    <div class="{{ basetheme()->btheme('bg-sub-menu-style') . ' base-container translate-y-4 shadow-lg rounded' }}">
        <div class="flex flex-col md:flex-row md:justify-between items-center gap-1 lg:gap-2">
            @php
            foreach(__featureables(\Hascha\BaseTheme\Facade\Features\Content::class, ['subMenu', 'item'], 'header') as $_key => $i) {
                echo e($i);
            }
            @endphp
        </div>
    </div>
    @endif
</div>