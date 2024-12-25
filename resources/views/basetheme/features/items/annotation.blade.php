<div class="{{ empty($text) ? 'hidden' : '' }}">
    <x-base::items.annotation typeOf="annotation-anchor" :url="$url">
        {{ $text }}
    </x-base::items.annotation>
</div>