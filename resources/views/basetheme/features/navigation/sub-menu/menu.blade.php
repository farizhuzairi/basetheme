<ul {{
    $attributes->merge(['class' => $attributes->prepends('base-flex-wrap-space font-sub-menu py-3')])
}}>
    @foreach($menu as $i)
        <x-base-component::nav-menu :key="liveKey($i['text'], 'sub_menu_')"
        :typeOf="$i['typeOf']"
        :text="$i['text']"
        :url="$i['url']"
        :icon="$i['icon']"
        :dropdown="$i['dropdown'] ?? []"
        :dataHero="$i['dataHero'] ?? []"
        />
    @endforeach
</ul>