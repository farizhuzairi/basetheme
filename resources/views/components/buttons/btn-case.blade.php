@props([
    'url' => '#',
    'withTranslate' => false
])
@php
$translateCss = "";

if($withTranslate){
    $translateCss = "hover:-translate-y-0.5 hover:translate-x-0.5 transition-all";
}
@endphp
<a {{
    $attributes->merge([
        'class' => $attributes->prepends('inline-block font-poppins font-normal bg-primary p-0 shadow text-c-text-white rounded tracking-wide ' . $activeCss),
        'href' => $url,
    ])
    ->merge([
        'class' => $translateCss
    ])
}}>
<span class="inline-block px-3 py-1">{{ $text }}</span>
@if(!empty($icon))
<span class="bg-white inline-block px-1 py-1 text-primary border border-primary rounded-e text-[1.1rem] {{ $icon }}"></span>
@endif
</a>