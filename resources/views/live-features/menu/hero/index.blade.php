<div class="{{ $container ? 'bg-c-light-thin dark:bg-c-light text-c-text absolute base-padding shadow-lg w-full py-5 z-30' : 'hidden' }}">
@if($container)
<div class="base-flex-spacer max-h-[65vh] md:max-h-[55vh] lg:max-h-[65vh] overflow-y-auto relative py-3">
    <div class="absolute right-3 top-2">
        <x-base::buttons.close :isIconOnly="true" wire:click="close"/>
    </div>
    <x-base::title.lite :title="$this->dto->subject ?? $this->dto->title" class="font-medium text-info text-3xl"/>
    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-12 md:col-span-3 lg:col-span-2 base-flex-spacer">
            {{-- Menu Side Content here ... --}}
            <x-base::_contents :key="liveKey($this->dto->title, 'menu_side_contents_')"
            class="base-flex-spacer"
            :contents="$this->dto->sideContents"
            />
            
        </div>
        <div class="col-span-12 md:col-span-9 lg:col-span-8">
            {{-- Menu Body Content here ... --}}
            <x-base::_contents :key="liveKey($this->dto->title, 'menu_live_contents_')"
            class="base-flex-spacer"
            :contents="$this->dto->liveContents"
            />
        </div>
        <div class="col-span-12 lg:col-span-2">
            {{-- Aside Right Content here... --}}
            <x-base::_contents :key="liveKey($this->dto->title, 'menu_additional_contents_')"
            class="base-flex-spacer-max font-light dark:font-normal text-c-text"
            :contents="$this->dto->additionalContents"
            />
        </div>
    </div>
    <div class="grid grid-cols-12 gap-5">
        @if($this->dto->subDescription)
        <div class="col-span-12 lg:col-span-10 base flex text-c-text-thin text-sm">
            $this->dto->subDescription
        </div>
        @endif
        {{--<div class="col-span-12 md:col-start-9 md:col-span-4 lg:col-span-2">
            <x-base::buttons.close wire:click="close">{{ 'Tutup Menu' }} </x-base::buttons.close>
        </div>--}}
    </div>
</div>
@endif
</div>