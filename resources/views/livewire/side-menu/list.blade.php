<li>
    <a href="{{ $this->dto->url }}" class="flex justify-between gap-1 items-center hover:bg-c-theme px-4 py-2 group">
        <div>
            @if(! empty($this->dto->icon))<span class="{{ $this->dto->icon }} font-light group-hover:font-semibold me-0.5"></span>@endif<span class="font-medium">{{ $this->dto->text }}</span>
        </div>
    </a>
</li>