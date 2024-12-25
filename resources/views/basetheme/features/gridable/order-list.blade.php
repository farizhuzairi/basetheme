<div {{ $attributes->merge(['class' => $attributes->prepends('base-padding')]) }}>
<x-base::subject
:$subject
:$introduction
/>
<div class="base-flex-space font-sans">
    <x-base::empty-text
    :text="empty($lists) ? $emptyText : null"
    />
    @foreach($lists as $_key => $i)
    <livewire:gridable-order
    :key="$loop->iteration . $_key"
    :title="$i['title']"
    :subTitle="$i['subTitle']"
    :buttons="$i['buttons']"
    :details="$i['details']"
    />
    @endforeach
</div>
</div>