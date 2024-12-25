<div {{ $attributes->merge(['class' => $attributes->prepends('px-4 lg:px-8')]) }}>
<x-base::subject
:$subject
:$introduction
/>
<livewire:board.index :key="liveKey(($subject ?? 'bc'), 'board_counter_')"
:_key="$_key"
:refName="$refName"
/>
</div>