<div {{
    $attributes->merge(['class' => $attributes->prepends('px-5 py-3 text-[0.9em] base-flex')])
}}>
    <a href="{{ $url }}" class="block hover:translate-x-1 transition-all leading-5">
        @if($icons['start'])<span class="{{ $icons['start'] }}"></span>@endif
        <span class="font-medium">{{ $text }}</span>
        @if($icons['end'])<span class="{{ $icons['end'] }}"></span>@endif
    </a>
    @if($description)
    <p class="font-titillium">
        {{ $description }}
    </p>
    @endif
</div>