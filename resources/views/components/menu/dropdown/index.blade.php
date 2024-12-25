@props([
    'li',
    'theme' => null
])
@php
switch($theme) {
    case 'primary':
        $css = " bg-primary dark:bg-primary text-c-text dark:text-c-text outline-secondary";
        break;
    case 'theme':
        $css = " bg-c-theme dark:bg-c-dark text-c-theme-text dark:text-c-text outline-c-dark-thin";
        break;
    default:
        $css = " bg-c-light-thick dark:bg-c-light-thick text-c-text dark:text-c-text outline-c-light-thick";
        break;
}
@endphp
<div {{
    $attributes->merge(['class' => $attributes->prepends('absolute w-[255px] mt-3 rounded flex flex-col gap-0 outline outline-offset-2 outline-1' . $css)])
}} x-show="open" x-cloak x-transition x-on:click.away="open = false">
<ul {{
    $li->attributes->merge(['class' => $attributes->prepends('translate-x-3 translate-y-3 rounded shadow-lg border-b border-r border-c-theme ' . basetheme()->btheme('dropdown'))])
}}>
{{ $li }}
</ul>
</div>