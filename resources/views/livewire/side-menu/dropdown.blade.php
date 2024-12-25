<li x-data="{ sideMenu: {{ $this->dto->isActive ? 'true' : 'false' }} }">
    <a href="{{ $this->dto->url }}" x-on:click.prevent="sideMenu = ! sideMenu" class="flex justify-between gap-1 items-center hover:bg-c-theme px-4 py-2 group">
        <div>
            @if(! empty($this->dto->icon))<span class="{{ $this->dto->icon }} font-light group-hover:font-semibold me-0.5"></span>@endif<span :class="sideMenu ? 'font-normal' : 'font-medium'">{{ $this->dto->text }}</span>
        </div>
        <span :class="sideMenu ? 'hascha-cheveron-down' : 'hascha-cheveron-right'"></span>
    </a>
    <ul class="base-flex ms-3" x-show="sideMenu" x-cloak x-transition>
        @foreach($this->dto->dropdown as $sub)
        <livewire:side-menu :key="Str::slug($sub['text']) . $loop->iteration"
        :text="$sub['text']"
        :url="$sub['url'] ?? '#'"
        :icon="$sub['icon'] ?? null"
        :asDropdown="true"
        />
        @endforeach
    </ul>
</li>