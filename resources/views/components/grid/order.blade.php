@props([
    'title',
    'subTitle',
    'tags' => [],
    'lists' => [],
    'button' => [],
    'readmore' => [],
])
<div {{
    $attributes->merge(['class' => $attributes->prepends('base-flex min-h-96 text-c-text-thin hover:text-c-text-white bg-white hover:bg-c-theme dark:bg-c-light dark:hover:bg-c-dark border border-c-border dark:border-c-border-thick hover:border-c-border p-5 hover:scale-105 hover:shadow-lg hover:-translate-y-1 hover:rounded-lg hover:outline hover:outline-offset-2 hover:outline-1 hover:outline-c-theme transition duration-300 ease-in group')])
}}>
    <h3 class="font-menu font-semibold text-xl leading-5 flex justify-between gap-1 items-center">
        {{ $title }}
        <span class="text-sm font-light text-end">{{ $subTitle }}</span>
    </h3>
    @if($tags)
    <ul>
        @foreach($tags as $tag)
        <li class="{{ $tag['class'] }}">
            <span class="font-semibold font-lato text-sm">{{ $tag['label'] }}</span>
            <span class="text-xs">{{ $tag['text'] }}</span>
        </li>
        @endforeach
    </ul>
    @endif
    <div class="mt-3 mb-5 text-sm base-flex-spacer">
        <ul>
            @foreach($lists as $list)
            <li>
                @if($list['icon'])<span class="{{ $list['icon'] }}"></span>@endif
                <span class="font-medium">{{ $list['label'] }}</span>
                @if($list['description'])<p class="font-sans">{{ $list['description'] }}</p>@endif
            </li>
            @endforeach
        </ul>
    </div>
    <div class="mt-auto flex flex-col items-center justify-center">
        @if($button)
        <x-buttons::index
        :key="liveKey($button['text'] . $title, 'grid_order_btn_el_')"
        :text="$button['text']"
        typeOf="case"
        :icon="$button['icon']"
        class="text-xs"
        url="#case"
        themeColor="base"
        />
        @endif
        @if($readmore)
        <div>
            <a href="{{ $readmore['url'] }}" class="text-xs text-c-text-light group-hover:text-c-text-thin hover:underline">
                {{ $readmore['text'] }}
                @if($readmore['icon'])<span class="{{ $readmore['icon'] }}"></span>@endif
            </a>
        </div>
        @endif
    </div>
</div>