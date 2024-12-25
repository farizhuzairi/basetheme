@php
switch($section) {
    case 'max':
        $section = "base-flex-spacer";
        break;
    case 'base':
    default:
        $section = "base-container base-flex-spacer py-8";
        break;
}
$mainCss = !empty($aside) ? " col-span-12 md:col-span-9" : " col-span-12";
@endphp
<div {{
    $attributes->merge(['class' => $attributes->prepends($section)])
}}>
<div>
<x-base::title :label="$label">
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:description>{{ $introduction }}</x-slot:description>
</x-base::title>
</div>
<div class="grid grid-cols-12 gap-5 lg:gap-12">
    @if($main)
    <div {{
        $main->attributes->merge(['class' => $attributes->prepends('order-2 md:order-1' . $mainCss)])
    }}>{{ $main }}</div>
    @endif
    @if($aside)
    <div {{
        $aside->attributes->merge(['class' => $attributes->prepends('col-span-12 md:col-span-3 order-1 md:order-2 bg-c-light dark:bg-c-theme text-c-text dark:text-c-light-thick px-3 py-5 border border-c-border-thick dark:border-c-dark rounded shadow-lg')])
    }}>{{ $aside }}</div>
    @endif
</div>
{{ $slot }}
</div>