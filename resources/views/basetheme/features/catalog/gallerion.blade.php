@props(__props_badge([
    'bgImage' => asset('images/bg/basethick.png'),
    'bgStyle' => '',
]))

@php
$bgStyle = "";

if($bgImage) {
    $bgStyle .= " background-image:url('{$bgImage}');";
}
@endphp

<div {{
    $attributes->merge(['class' => $attributes->prepends('bg-c-dark dark:bg-c-dark-thick text-c-text-light bg-no-repeat bg-cover bg-center shadow')])
    ->merge([
        "style" => $bgStyle
    ])
}}>
    <div class="base-container py-12">
        @if(isset($subject) || !empty($badge))
        <div class="flex flex-col lg:flex-row lg:justify-between lg:gap-2 lg:items-center">
            @if(isset($subject))<h2 class="font-sub-title text-c-light text-3xl">{{ $subject }}</h2>@endif
            @if(isset($badge))<span class="text-sm">{{ $badge }}</span>@endif
        </div>
        @endif
        <p class="{{ empty($introduction) ? 'hidden' : 'text-sm' }}">{{ $introduction }}</p>
        <x-base::catalog.galleries
        :items="$items"
        :withBox="$withBox"
        :boxColor="$boxColor"
        />
        <x-base::card.content
        :$contents
        />
    </div>
</div>