@props(__props_class([
    'subject' => null,
    'introduction' => null,
    'textAlign' => 'left',
    'withBackground' => false
]))
@php
switch($textAlign) {
    case 'left':
        $textAlign = "";
        break;
    case 'center':
    default:
        $textAlign = " justify-center items-center";
        break;
}

$bg = "";
if($withBackground) {
    $bg = " bg-c-light-thin/50 text-c-text dark:bg-c-dark/75 dark:text-c-text-white p-3 rounded";
}
@endphp
@if(!empty($subject))
<div {{
    $attributes->merge(['class' => $attributes->prepends('base-flex-thin mb-5')])
    ->merge([
        'class' => $class . $textAlign . $bg,
        'style' => $style,
    ])
}}>
    <h2 class="font-title font-semibold text-xl leading-5">{{ $subject }}</h2>
    @if($introduction)<p class="text-sm font-light">{{ $introduction }}</p>@endif
</div>
@endif