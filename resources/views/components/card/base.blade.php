<div {{ $attributes->merge(['class' => $attributes->prepends('card-base')]) }}>
    {{ $slot }}
</div>