<div {{ $attributes->merge(['class' => $attributes->prepends('card-body')]) }}>
    {{ $slot }}
</div>