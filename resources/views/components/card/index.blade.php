@props([
    'topBorder' => null,
])
@php
switch ($topBorder) {
    case "success":
        $_css = " border-success/75";
        break;
    case "danger":
        $_css = " border-danger/75";
        break;
    case "primary":
        $_css = " border-primary/75";
        break;
    default:
        $_css = " border-c-border-thin/75";
        break;
}
@endphp
<div {{ $attributes->merge(['class' => $attributes->prepends('border-b-2 rounded-b' . $_css)]) }}>
<x-base::card.base>
{{ $slot }}
</x-base::card.base>
</div>