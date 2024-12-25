<div {{
    $attributes->merge(['class' => $attributes->prepends('flex flex-wrap gap-1 items-center')])
}}>
    @foreach($tags as $tag)
    <x-dynamic-component :component="'base::tagables.' . $tag['typeOf']" :key="liveKey($loop->iteration, 'tagable_thead_')"
    :text="$tag['text'] ?? null"
    :icon="$tag['icon'] ?? null"
    :url="$tag['url'] ?? null"
    />
    @endforeach
</div>