<li>
    <a href="{{ $url }}" class="{{ $style }}">
        <h5>
            @if(! empty($icon))<span class="{{ $icon }}"></span>@endif
            {{ $text }}
        </h5>
        @if($details)<p class="{{ $subStyle }}">{{ $details }}</p>@endif
    </a>
</li>