@php
foreach(__featureables(\HaschaMedia\BaseTheme\Facade\Features\Content::class, [], 'header') as $_key => $i) {
    echo e($i);
}
@endphp