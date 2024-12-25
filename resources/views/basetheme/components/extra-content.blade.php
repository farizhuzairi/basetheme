<div {{ $attributes->merge(['class' => $attributes->prepends($addClass)]) }}>
    <div class="base-container py-5">
        <h3 class="font-sub-title">{{ $title }}</h3>
        <div>{!! $description !!}</div>
    </div>
</div>