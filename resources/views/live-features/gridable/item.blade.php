<div class="grid grid-cols-12 gap-0 border border-c-border dark:border-c-border-thick rounded">
    <div class="col-span-12 md:col-span-4 lg:col-span-3 bg-contain bg-right bg-no-repeat shadow-lg border-s-4 border-c-border-thick dark:border-primary rounded-t md:rounded-none md:rounded-tl" style="background-image: url('{{ asset('/images/base-layout/image2.jpeg') }}')">
        <div class="bg-secondary/75 dark:bg-secondary h-full text-c-dark dark:text-c-theme flex flex-col gap-3 p-3">
            <h3 class="font-title font-medium leading-5">
                <span class="block text-base">{{ $title }}</span>
                @if(! empty($subTitle))<span class="text-sm font-light">{{ $subTitle }}</span>@endif
            </h3>
            <div class="mt-auto text-sm text-primary dark:text-primary flex flex-wrap gap-3 items-center">
                @foreach($buttons as $btn)
                <livewire:live-button :key="$loop->iteration . Str::slug($btn['text'])"
                :textButton="$btn['text']"
                :url="$btn['url'] ?? '#'"
                :icon="$btn['icon'] ?? null"
                :typeOf="$btn['typeOf'] ?? 'inline'"
                />
                @endforeach
            </div>
        </div>
    </div>
    @if($details)
    <div class="col-span-12 md:col-span-8 lg:col-span-9 bg-white dark:bg-c-light text-c-dark p-3 rounded-b md:rounded-none md:rounded-tr">
        @if(! empty($details['flags'] ??  []))
        <ul class="flex flex-wrap gap-1 lg:gap-0 items-center lg:divide-x lg:divide-c-light text-c-dark-thin mb-1">
            @foreach($details['flags'] as $flag)
            <li class="px-3 lg:first:ps-0 lg:last:pe-0 border lg:border-0 border-c-light rounded">
                <span class="hascha-drag_handle text-c-light-thick"></span>
                <span class="text-sm">{{ $flag }}</span>
            </li>
            @endforeach
        </ul>
        @endif
        @if(! empty($details['description'] ?? []))
        <div class="text-c-dark-thin">
            {{ $details['description'] }}
        </div>
        @endif
    </div>
    @endif
    @if(! empty($subTitle))
    <div class="col-span-12 base-flex-space text-sm">
        <x-base::labels.status :typeOf="'success'" :withHover="true" :withBetween="true">
            <div>
                <span class="hascha-miscellaneous_services"></span>
                {{ 'Running' }}
            </div>
            <div class="text-[0.9em]">
                {{ 'Platform Services Available' }}
                <x-base::badges.counter :typeOf="'success'" count="2"/>
            </div>
        </x-base::labels.status>
    </div>
    @else
    <div class="col-span-12 base-flex-space text-sm">
        <x-base::labels.status :typeOf="'danger'" :withHover="true" :withBetween="true">
            <div>
                <span class="hascha-warning"></span>
                {{ 'Tidak aktif' }}
            </div>
            <div class="text-[0.9em]">
                {{ 'Platform Services Available' }}
                <x-base::badges.counter :typeOf="'danger'" count="1"/>
            </div>
        </x-base::labels.status>
    </div>
    @endif
</div>