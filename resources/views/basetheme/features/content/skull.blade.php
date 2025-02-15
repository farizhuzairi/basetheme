@props(__props_class())
<div {{
    $attributes->merge(['class' => $attributes->prepends('base-flex bg-white dark:bg-c-dark')])
    ->merge([
        'class' => $class,
        'style' => $style,
    ])
}}>
    <div class="flex flex-col justify-center items-center mb-12">
        <h2 class="font-title font-semibold text-lg text-primary leading-5">{{ $subject }}</h2>
        @if($introduction)<p class="text-sm font-light">{{ $introduction }}</p>@endif
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8">
        @for($x=0; $x < 4; $x++)
        <div class="border border-c-border rounded shadow bg-white dark:bg-c-light dark:hover:bg-c-theme text-c-text hover:text-c-text-white hover:scale-105 hover:-translate-y-3 transition-all group">
            <div class="h-full border-b-2 border-primary flex flex-row gap-5 px-3 py-5 rounded-b group-hover:border-b-4 transition-all">
                <div class="flex items-center text-3xl group-hover:text-warning"><span class="hascha-star"></span></div>
                <div>
                    <h4 class="font-semibold font-bubbles text-lg">{{ 'Featured' }}</h4>
                    <div class="font-sans leading-5">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum odit saepe ipsam neque maxime vero aut suscipit! Maiores labore harum quod perspiciatis.
                    </div>

                </div>
            </div>
        </div>
        @endfor
    </div>
</div>