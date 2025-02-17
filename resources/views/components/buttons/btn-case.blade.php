@props([
    'url' => '#',
    'withTranslate' => false,
    'themeColor' => null
])
@php
$translateCss = "";

if($withTranslate){
    $translateCss = "hover:-translate-y-0.5 hover:translate-x-0.5 transition-all";
}

$iconCss = "";
$bgCss = "";
switch ($themeColor) {
    case 'base':
        $iconCss = " text-c-theme border-c-theme";
        $bgCss = " bg-c-theme text-c-text-white";
        break;
    case 'secondary':
        $iconCss = " text-c-text border-secondary";
        $bgCss = " bg-secondary text-c-text";
        break;
    case 'light':
        $iconCss = " text-c-text-light border-c-light";
        $bgCss = " bg-c-light text-c-text";
        break;
    case 'info':
        $iconCss = " text-c-text border-info";
        $bgCss = " bg-info text-c-text-white";
        break;
    case 'primary':
    default:
        $iconCss = " text-primary border-primary";
        $bgCss = " bg-primary text-c-text-white";
        break;
}
@endphp
<a {{
    $attributes->merge([
        'class' => $attributes->prepends('inline-block font-poppins font-normal p-0 shadow rounded tracking-wide ' . $activeCss . $bgCss),
        'href' => $url,
    ])
    ->merge([
        'class' => $translateCss
    ])
}}>
<span class="inline-block px-3 py-1">{{ $text }}</span>
@if(!empty($icon))
<span class="bg-white inline-block px-1 py-1 border rounded-e text-[1.1rem] {{ $icon . $iconCss }}"></span>
@endif
</a>