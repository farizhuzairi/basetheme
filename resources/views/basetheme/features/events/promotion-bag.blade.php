<div class="{{ $items ? '' : 'hidden' }}">
    @if($items)
    <x-base::title.lite :title="$subject" class="mb-3"/>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
        @foreach($items as $item)
        <a href="{{ $item['url'] }}" class="group flex flex-col">
            <x-base::image :src="$item['image']" alt="{{ $item['title'] . ' - Front Image' }}" :key="liveKey($item['title'], 'really_image_')" class="group-hover:scale-125 transition-all"/>
            <div class="mt-auto base-flex text-center text-sm">
                <h6 class="font-sub-menu font-medium text-base border border-c-border px-3 py-1 mb-2 rounded">{{ $item['title'] }}</h6>
                <p class="font-sans">{{ $item['description'] }}</p>
            </div>
        </a>
        @endforeach
    </div>
    @endif
</div>