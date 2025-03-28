@props(__props_class(__props_themeColor(__props_gridable(__props_button([
    'items' => [],
])))))
@php
$iCount = count($items);
$iGrid = "grid-cols-1 md:grid-cols-2";

if(is_array($gridCount)) {
    $sm = $gridCount['sm'];
    $md = $gridCount['md'];
    $lg = $gridCount['lg'];
}

if(is_array($gridCount)) {
    $iGrid = "grid-cols-{$sm} md:grid-cols-{$md} lg:grid-cols-{$lg} px-0";
}
elseif(is_int($gridCount) && $gridCount > 0) {
    $iGrid = "grid-cols-".$gridCount." md:px-0 lg:px-0";
}
elseif(empty($gridCount) && $iCount === 1) {
    $iGrid = "grid-cols-1 md:px-8 lg:px-24";
}
elseif(empty($gridCount) && $iCount >= 5) {
    $iGrid = "grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:px-8 lg:px-0";
}
else {
    $iGrid .= " md:px-8 lg:px-24";
}
@endphp
<div {{
    $attributes->merge(['class' => $attributes->prepends('base-flex')])
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
    <div class="grid-box grid {{ $iGrid }} gap-5 md:gap-8 lg:gap-8">
        @foreach($items as $i)
        <x-base::grid.featured
        :key="liveKey($i['title'], 'grid_featured_')"
        :icon="$i['icon']"
        :iconColor="$i['iconColor']"
        :title="$i['title']"
        :description="$i['description']"
        :themeColor="$themeColor"
        :class="$i['class']"
        :buttonText="$i['buttonText']"
        :$withBox
        />
        @endforeach
    </div>
</div>