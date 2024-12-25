@props([
    'url' => null
])
<h1 {{
    $attributes->merge(['class' => $attributes->prepends('font-title font-semibold text-lg me-1')])
}}>
@if($url)
<a href="{{ $url }}">{{ $subject }}</a>
@else
{{ $subject }}
@endif
</h1>