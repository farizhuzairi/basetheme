<div {{ $attributes }}>
    @if($container)
    @php

    $featureables_first = __featureables(\Hascha\BaseTheme\Facade\Features\Content::class, ['headline', 'tagables'], 'header');

    $featureables_second = __featureables(\Hascha\BaseTheme\Facade\Features\Content::class, ['topButtons'], 'header');

    @endphp
    <div class="base-container base-flex">

        <div class="flex flex-col md:flex-row md:justify-between gap-2 md:gap-3 md:items-center">
            <div class="flex flex-wrap gap-2 items-center">
                @php
                foreach($featureables_first as $_key => $i) {
                    echo e($i);
                }
                @endphp
            </div>
            <div class="base-flex-wrap-thin">
                @php
                foreach($featureables_second as $_key => $i) {
                    echo e($i);
                }
                @endphp
            </div>
        </div>
        <div class="{{ $slot->isEmpty() ? 'hidden' : 'mt-3 py-2' }}">
        {{ $slot }}
        </div>
    </div>
    @endif
</div>