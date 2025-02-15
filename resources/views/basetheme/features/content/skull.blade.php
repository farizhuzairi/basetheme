@props(__props_class())
<div {{
    $attributes->merge(['class' => $attributes->prepends('base-flex bg-white')])
    ->merge([
        'class' => $class,
        'style' => $style,
    ])
}}>
    <h2 class="font-title font-medium text-lg flex justify-center mb-12">{{ $subject }}</h2>
    <div class="grid grid-cols-2 gap-8">
        @for($x=0; $x < 4; $x++)
        <div class="border border-c-border rounded-lg bg-white hover:bg-c-theme text-c-text hover:text-c-text-white transition-all px-3 py-5 flex flex-row gap-5 group">
            <div class="flex items-center text-3xl group-hover:text-warning"><span class="hascha-star"></span></div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure ea vitae culpa odit placeat. Sapiente accusantium, cum minima nostrum voluptatem sed. Labore.
            </div>
        </div>
        @endfor
    </div>
</div>