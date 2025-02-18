@props(__props_class())
<div {{
    $attributes->merge(['class' => $attributes->prepends('base-flex-space')])
    ->merge([
        'class' => $class,
        'style' => $style,
    ])
}}>
    <x-base::title.base
    :$subject
    :$introduction
    :withBackground="true"
    textAlign="center"
    />
    <div class="flex flex-wrap justify-center">
        @foreach($items as $i)
        <x-base::grid.order
        :key="liveKey($i['title'], 'grid_order_')"
        class="w-full md:w-1/2 lg:w-1/3"
        :title="$i['title']"
        :subTitle="$i['subTitle']"
        :tags="$i['tags']"
        :lists="$i['lists']"
        :button="$i['button']"
        :readmore="$i['readmore']"
        />
        @endforeach
    </div>
</div>