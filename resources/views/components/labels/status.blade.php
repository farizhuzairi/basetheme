@props([
    'typeOf' => null,
    'withHover' => false,
    'withBetween' => false,
])
@php
switch($typeOf) {
    case "success":
        $typeOf_css = " bg-success text-c-light";
        break;
    case "danger":
        $typeOf_css = " bg-danger text-c-light";
        break;
    default:
        $typeOf_css = " bg-c-light-thin";
        break;
}

if($withHover) {
    switch($typeOf) {
        case "success":
            $typeOf_css .= " bg-success/75 hover:bg-success";
            break;
        case "danger":
            $typeOf_css .= " bg-danger/75 hover:bg-danger";
            break;
        default:
            $typeOf_css .= "";
            break;
    }
}

if($withBetween) {
    $typeOf_css .= " flex justify-between items-center";
}
@endphp
<div {{ $attributes->merge(['class' => $attributes->prepends('px-3 py-1 rounded-b transition-all' . $typeOf_css)]) }}>{{ $slot }}</div>