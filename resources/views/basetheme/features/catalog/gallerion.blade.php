@props([
    'bgImage' => asset('images/basethick1.png'),
    'style' => '',
])

@php
$style = "";

if($bgImage) {
    $style .= " background-image:url('{$bgImage}');";
}
@endphp

<div {{
    $attributes->merge(['class' => $attributes->prepends('bg-c-dark dark:bg-c-dark-thick text-c-light-thin bg-no-repeat bg-cover bg-center shadow')])
    ->merge([
        "style" => $style
    ])
}}>
    <div class="base-container py-12">
        @if(isset($subject) || isset($subTitle))
        <div class="flex flex-col md:flex-row md:justify-between md:gap-2 md:items-center">
            @if(isset($subject))<h2 class="font-sub-title text-3xl">{{ $subject }}</h2>@endif
            @if(isset($subTitle))<span class="text-sm text-slate-400">{{ $subTitle }}</span>@endif
        </div>
        @endif
        <p class="{{ empty($introduction) ? 'hidden' : 'text-sm' }}">{{ $introduction }}</p>
        <x-base::card.content
        :$contents
        />
        <x-base::catalog.galleries :items="$items" :withBox="$withBox" :boxColor="$boxColor"/>
    </div>
</div>