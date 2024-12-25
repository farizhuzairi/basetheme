@props([
    'typeOf' => null,
    'withHover' => false,
    'count' => 0,
])
@php
switch($typeOf) {
    case "success":
        $typeOf_css = " bg-success/75 text-c-light";
        break;
    case "danger":
        $typeOf_css = " bg-danger/75 text-c-light";
        break;
    default:
        $typeOf_css = " bg-c-light text-c-dark-thin";
        break;
}
@endphp
<span {{ $attributes->merge(['class' => $attributes->prepends('px-2 py-0.5 rounded font-sans font-bold inline-block' . $typeOf_css)]) }}>{{ $count }}</span>