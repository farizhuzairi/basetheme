@props([
    'icon' => 'hascha-close-solid',
    'theme' => null,
    'isIconOnly' => false,
])
@php
switch ($theme) {
    case "dark":
        $css = " bg-c-dark text-c-light-thin hover:shadow-md";
        break;
    case "danger":
        $css = " bg-danger text-c-light-thin hover:shadow-md";
        break;
    default:
        $css = " bg-c-light-thick text-c-text hover:bg-c-dark-thin hover:text-c-light";
        break;
}
@endphp
<div {{
    $attributes
}}>
@if($isIconOnly)
<x-base::buttons.reset class="bg-danger opacity-75 text-c-light-thin shadow-lg px-3 py-2 rounded-lg"><span class="hascha-close"></span></x-base::buttons.reset>
@else
<x-base::buttons.reset :border="false" class="{{ 'w-full px-5 py-2 rounded transition-all' . $css }}">
    @if($icon)<span class="hascha-close-solid"></span>@endif
    {{ $slot }}
</x-base::buttons.reset>
@endif
</div>