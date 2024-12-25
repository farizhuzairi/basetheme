@php
foreach(__featureables(\Hascha\BaseTheme\Facade\Features\Content::class, [], 'header') as $_key => $i) {
    echo e($i);
}
@endphp