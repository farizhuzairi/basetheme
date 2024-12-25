@props([
    'subject' => null,
    'introduction' => null,
    'image' => null,
    'link' => null,
    'textLink' => null,
])
<div {{
    $attributes->merge(['class' => $attributes->prepends('font-titillium')])
}}>
@if($subject || $introduction)
<h5 class="text-base font-semibold leading-5">{{ $subject }}</h5>
<p class="text-sm font-sans leading-5 mb-1">{{ $introduction }}</p>
@endif
@if($image)
<x-base::image :src="$image" alt="example image" class="mb-1"/>
@endif
<div class="leading-auto">{{ $description }}</div>
@if($link)<a href="{{ $link }}" class="font-medium font-sans text-sm hover:underline transition-all">{{ $textLink . "..." }}</a>@endif
</div>