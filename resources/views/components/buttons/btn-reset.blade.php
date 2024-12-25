@props([
    'border' => true,
    'font' => 'font-btn',
])

@php
if($border){
    $thClass = " border-0 active:border-0";
}else{
    $thClass = "";
}
@endphp

<button {{
    $attributes->merge([
        'class' => $attributes->prepends('ring-0 active:ring-0 outline-none active:outline-none ' . $font . $thClass),
        'type' => $btnType
    ])
}}>{{ $slot }}</button>