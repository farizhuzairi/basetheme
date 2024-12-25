<div {{ $attributes }}>
    <div class="px-4 mb-1">
        <livewire:nav-brand css="px-4" :key="liveKey(($headTitle ?? 'empty'), 'side_')"
        :brandMenu="$headTitle ?? null"
        :logo="$headLogo ?? null"
        :icon="$headIcon ?? null"
        :url="$headUrl ?? null"
        :showLogo="$showLogo ?? true"
        :withIcon="$withIcon ?? false"
        />
    </div>
    <h2 class="font-semibold text-4xl items-center border-s-12 border-primary leading-11 px-1">{{ $subject }}</h2>
    <div class="font-primary font-light mt-3 px-4">
        {{ $introduction }}
    </div>
    @if(! empty($buttons))
    <div class="flex flex-wrap gap-1 items-center mt-3 px-4 py-3">
        @foreach($buttons as $btn)
        <livewire:live-button :key="Str::slug($btn['text']) . $loop->iteration"
        typeOf="base"
        :textButton="$btn['text']"
        :url="$btn['url']"
        :css="$btn['main'] ? 'bg-c-dark-thin text-c-light-thin' : 'text-c-light-thin'"
        />
        @endforeach
    </div>
    @endif
</div>