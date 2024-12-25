@props([
    'contents' => null
])
@if($contents)
<div {{ $attributes }}>
@php
if(! empty($contents)) {
    foreach($contents as $_content) {
        echo e($_content);
    }
}
@endphp
</div>
@endif