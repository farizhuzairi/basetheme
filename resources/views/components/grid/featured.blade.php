@props(__props_class([
    'icon' => null,
    'iconColor' => null,
    'title' => null,
    'description' => null,
    'themeColor' => null,
    'buttonText' => 'Selengkapnya',
    'withBox'
]))
@php
$box = "";
if($withBox) {
    $box = " border border-c-border hover:border-transparent dark:border-c-border-deep shadow";
}
@endphp
<div {{
    $attributes->merge(['class' => $attributes->prepends('grid-featured rounded bg-c-light-white hover:bg-c-theme dark:bg-c-light dark:hover:bg-c-theme text-c-text hover:text-c-text-white hover:scale-105 hover:-translate-y-1 transition duration-300 ease-in group' . $box)])
    ->merge([
        'class' => $class,
        'style' => $style,
    ])
}}>
    <div class="h-full border-b-4 border-transparent flex flex-row gap-5 px-3 py-5 rounded-b group-hover:border-b-4 group-hover:border-primary transition-all">
        @if($icon)<div class="flex items-center text-4xl px-3 group-hover:text-{{ $iconColor }}"><span class="{{ $icon }}"></span></div>@endif
        <div class="base-flex">
            <h4 class="font-semibold font-bubbles text-lg">{{ $title }}</h4>
            <div class="font-sans leading-5">{{ $description }}</div>
            <div class="mt-3">
                <x-buttons::index
                :text="$buttonText"
                typeOf="case"
                icon="hascha-right"
                class="text-sm"
                url="#case"
                :themeColor="$themeColor"
                />
            </div>
        </div>
    </div>
</div>