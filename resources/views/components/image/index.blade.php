@props([
    'src' => null
])
@if($src)
<img {{
    $attributes->merge(['class' => $attributes->prepends('rounded')])
    ->merge([
        'class' => 'w-full h-auto',
        'src' => $src
    ])
}}>
@endif