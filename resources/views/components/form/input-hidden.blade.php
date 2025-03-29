@props([
    'label' => null,
    'type' => 'hidden',
    'id' => null,
    'name' => null,
])
<input spellcheck="false" autocomplete="off" {{
    $attributes->merge(['class' => $attributes->prepends('')])->merge([
        'type' => $type,
        'id' => $id,
        'name' => $name
    ])
}}/>