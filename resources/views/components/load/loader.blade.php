@props([
    "content" => null,
    "text" => "",
    "size" => null,
])

@php
switch ($size){
    case 'xs':
        $style = 'h-3 w-3';
        $text = 'text-sm';
        break;
    case 'md':
        $style = 'h-5 w-5';
        $text = 'text-md';
        break;
    case 'lg':
        $style = 'h-8 w-8';
        $text = 'text-lg';
        break;
    case 'sm':
    default:
        $style = 'h-4 w-4';
        $text = '';
        break;
}
@endphp

<div {{
    $attributes->merge(['class' => $attributes->prepends('inline-block animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]')])->merge([
        'role' => 'status',
        'class' => $style
    ])
}}>
    <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
    ></span>
</div>
@if($content)<div class="inline-block {{ $text }}">{{ $content }}</div>@endif