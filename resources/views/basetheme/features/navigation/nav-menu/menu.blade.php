<nav {{
    $attributes->merge(['class' => $attributes->prepends('hidden md:flex md:flex-wrap md:gap-5 md:items-center text-sm')])
}}>
    <ul class="base-flex-wrap-space font-menu">
        @foreach($menu as $i)
            <x-base-component::nav-menu :key="liveKey($i['text'], 'nav_menu_')"
            :typeOf="$i['typeOf']"
            :text="$i['text']"
            :url="$i['url']"
            :icon="$i['icon']"
            :dropdown="$i['dropdown'] ?? []"
            />
        @endforeach
    </ul>
</nav>