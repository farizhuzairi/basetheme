@props([
    'title',
])
<h5 {{
    $attributes->merge(['class' => $attributes->prepends('font-sub-title font-medium')])
    ->merge([
        'class' => 'text-base'
    ])
}}>{{ $title }}</h5>