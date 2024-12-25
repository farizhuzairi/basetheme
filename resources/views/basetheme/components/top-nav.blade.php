<div {{ $attributes }}>
    @if($container)
    <div class="base-container base-flex py-3">

        <div class="flex flex-col md:flex-row md:justify-between gap-2 md:gap-3 md:items-center">
            <div class="flex flex-wrap gap-2 items-center">
                @php
                foreach(__featureables(\HaschaMedia\BaseTheme\Facade\Features\Content::class, ['headline', 'tagables'], 'header') as $_key => $i) {
                    echo e($i);
                }
                @endphp
            </div>
            <div class="base-flex-wrap-thin">
                @php
                foreach(__featureables(\HaschaMedia\BaseTheme\Facade\Features\Content::class, ['topButtons'], 'header') as $_key => $i) {
                    echo e($i);
                }
                @endphp
            </div>
        </div>
        <div class="mt-3 py-2">
        @if($slot->isEmpty() && isset($__contents))
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
        @else
        {{ $slot }}
        @endif
        </div>
    </div>
    @endif
</div>