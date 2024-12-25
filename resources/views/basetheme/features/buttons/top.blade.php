@foreach($buttons as $btn)
<livewire:live-button :key="liveKey($btn['text'], $loop->iteration)"
:textButton="$btn['text']"
:url="$btn['url']"
:icon="$btn['icon']"
:typeOf="$btn['typeOf']"
css="text-sm"
/>
@endforeach