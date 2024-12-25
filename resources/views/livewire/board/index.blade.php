<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 {{ $this->dto->spaces }}" {{ $this->dto->wirePoll() }}>
@foreach($this->dto->lists as $_key => $i)
<x-dynamic-component
:component="'base::board.' . $i['typeOf']"
:key="liveKey($i['title'], 'board_' . $i['typeOf'] . '_')"
:title="$i['title']"
:url="$i['url']"
:info="$i['info']"
:icon="$i['icon']"
:counter="$i['counter']"
:newCounter="$i['newCounter'] ?? 0"
/>
@endforeach
</div>