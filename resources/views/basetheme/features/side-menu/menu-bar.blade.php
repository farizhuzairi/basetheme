<ul class="{{ $items ? 'base-flex-thin' : 'hidden' }}">
    @foreach($items as $item)
    <li class="block">
        <x-base::items.list :key="liveKey($item['title'], 'hero_menu_bar_items_')"
        theme="theme"
        :url="$item['url']"
        :withTranslate="true"
        >{{ $item['title'] }}</x-base::items.list>
    </li>
    @endforeach
</ul>