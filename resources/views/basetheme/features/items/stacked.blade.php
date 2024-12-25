<div class="{{ $items ? 'grid grid-cols-2 gap-5' : 'hidden' }}">
@foreach($items as $item)
<x-base::items.title :key="liveKey($item['title'], 'items_title_')"
theme="primary"
:subject="$item['title']"
:url="$item['url']"
>
<x-slot:details>{{ $item['description'] }}</x-slot:details>
</x-base::items.title>
@endforeach
</div>