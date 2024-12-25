<li class="relative {{ $style }} z-60" x-data="{ open: false }">
    <a href="{{ $url }}" x-on:click.prevent="open = ! open" :class="open ? 'border-b border-c-light-thick' : 'border-b border-transparent'">@if(! empty($icon))<span class="{{ $icon }} me-0.5"></span>@endif{{ $text }}</a>
    @if(! empty($dropdown))
    <x-base::menu.dropdown.index theme="theme">
        <x-slot:li>
            @foreach($dropdown as $_i)
                <x-base-component::nav-menu :key="liveKey($_i['text'], 'nav_menu_dropdown_')"
                style="base-flex font-menu font-medium px-4 py-1 hover:bg-c-light transition-all hover:first:rounded-t hover:last:rounded-b"
                subStyle="text-sm font-light font-menu"
                :typeOf="$_i['typeOf']"
                :text="$_i['text']"
                :url="$_i['url']"
                :icon="$_i['icon']"
                :details="$_i['details']"
                />
            @endforeach
        </x-slot:li>
    </x-base::menu.dropdown.index>
    @endif
</li>