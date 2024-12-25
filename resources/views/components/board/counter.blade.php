@props([
    'title' => null,
    'url' => '#',
    'info' => null,
    'counter' => 0,
    'icon' => null,
    'newCounter' => 0,
])
<div {{
    $attributes->merge(['class' => $attributes->prepends('bg-c-light-thin border border-c-border shadow hover:shadow-md p-3 rounded flex flex-col min-h-[60px]')])
    ->merge([
        'class' => $newCounter > 0 ? 'border border-c-theme'  : ''
    ])
}}>
    @if(! empty($title))<h3 class="font-title leading-4 text-sm">{{ $title }}</h3>@endif
    <div x-on:click="window.location.href='{{ $url }}'" class="cursor-pointer flex justify-between items-end gap-2 pb-1 mb-1 border-b border-c-border">
        <span class="text-xl">
            {{ $counter }}
            @if($newCounter > 0)<span class="hascha-information-solid text-sm text-primary font-semibold font-sans px-1 rounded-lg"></span>@endif
        </span>
        <span class="{{ $icon }} text-5xl text-c-light-thick/50"></span>
    </div>
    @if(! empty($info))
    <p class="flex justify-end text-sm text-info font-sans font-normal leading-4">{{ $info }}</p>
    @endif
</div>