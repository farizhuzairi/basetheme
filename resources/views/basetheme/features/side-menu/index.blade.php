<ul class="base-flex">
@if(! empty($subject))
<li class="bg-slate-900/50 text-c-light-dark border-s border-primary">
    <h4 class="font-normal block px-4 py-1">
        {{ $subject }}
    </h4>
    @if(! empty($introduction))<div class="text-xs px-4 pb-1 leading-4">{{ $introduction }}</div>@endif
</li>
@endif
@foreach($menu as $i)
<livewire:side-menu :key="liveKey($i['text'], 'sideMenu_')"
:text="$i['text']"
:url="$i['url'] ?? '#'"
:icon="$i['icon'] ?? null"
:dropdown="$i['dropdown'] ?? []"
:urls="$i['urls'] ?? []"
/>
@endforeach
</ul>