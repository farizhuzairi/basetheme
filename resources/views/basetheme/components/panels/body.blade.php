<div {{ $attributes->merge(['class' => $attributes->prepends('base-flex-spacer-max pb-5')]) }}>
    <div class="px-4 lg:px-8 py-1">
        <h2 class="font-title font-semibold text-base">
            <span class="hascha-segment"></span>
            {{ $__subject ?? $__title }}
        </h2>
    </div>
    @php
    foreach(__featureables(\HaschaMedia\BaseTheme\Facade\Features\Content::class, [], 'main') as $_key => $i) {
        echo e($i);
    }
    @endphp
</div>