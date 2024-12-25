<li class="{{ $style }}">
    <a href="{{ $url }}" @click.prevent="$dispatch('menu-hero', { name: '{{ $dataHero['name'] }}', dtoClass: '{{ str_replace('\\', '.', $dataHero['class']) }}', title: '{{ $dataHero['title'] }}' })">
        @if(! empty($icon))<span class="{{ $icon }}"></span>@endif
        {{ $text }}
        @if($details)<p class="{{ $subStyle }}">{{ $details }}</p>@endif
    </a>
</li>