<div {{ $attributes->merge(['class' => $attributes->prepends('base-flex-space')]) }}>
    <x-base::subject
    :subject="$subject"
    :introduction="$introduction"
    />
    @foreach($charts as $item)
    <div class="border-b border-c-border-thin">
        <livewire:charts :key="liveKey($item['label'], $item['pts'])"
        :label="$item['label']"
        :pts="$item['pts']"
        :wpts="$item['wpts'] ?? null"
        />
        @if(! empty($item['info']))
        <div class="text-sm py-1 pe-5">
            <span class="hascha-sticky_note_2"></span>
            {{ $item['info'] }}
        </div>
        @endif
    </div>
    @endforeach
    @if(! empty($buttons))
    <div class="flex flex-wrap justify-end items-center gap-1">
        @foreach($buttons as $btn)
        <livewire:live-button typeOf="base" :textButton="$btn['text']" :url="$btn['url']"/>
        @endforeach
    </div>
    @endif
</div>