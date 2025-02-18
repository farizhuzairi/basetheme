@props(__props_class([
    'withPadding' => true
]))

@php
$basePadding = "";
if($withPadding) {
    $basePadding .= " base-container";
}
@endphp
<div {{
    $attributes->merge(['class' => $attributes->prepends($basePadding)])
    ->merge([
        'class' => $class,
        'style' => $style
    ])
}}>
<div class="{{ $contentClass }}" style="{{ $contentStyle }}">
    @if($subject || $introduction)
    <x-base::title :withBorder="false" :class="!$withPadding ? '' : ''">
        <x-slot:title>{{ $subject }}</x-slot:title>
        <x-slot:description>{{ $introduction }}</x-slot:description>
    </x-base::title>
    @endif
    <div class="base-flex-spacer" x-data="{ cTab: '{{ array_key_first($tabs) }}' }">
        @if($isTabContent)
            <ul class="base-flex-wrap-space mb-3 justify-center">
                @foreach($tabs as $tabKey => $tab)
                <li class="cursor-pointer border border-c-border px-2 py-0.5 rounded text-sm text-c-text-thin font-sans transition duration-300 ease-in-out" @click="cTab = '{{ $tabKey }}'" :class="cTab === '{{ $tabKey }}' ? 'bg-c-theme font-semibold text-c-text-white hover:text-c-text-white' : 'bg-white hover:bg-c-light-thin hover:text-c-text'">{{ $tab['name'] }}</li>
                @endforeach
            </ul>
            @foreach($contents as $key => $content)
            <div x-show="cTab === '{{ $key }}'" x-cloak x-transition>
                <x-base::_contents :key="liveKey($key, 'tab_' . $key)" class="base-flex-spacer" :contents="[$key => $content]"/>
            </div>
            @endforeach
        @else
        <x-base::_contents class="base-flex-spacer" :$contents/>
        @endif
        @if($withButton)
        <div class="grid grid-cols-6">
            <div class="bg-c-light-thin dark:bg-c-dark-thick text-c-text-thin dark:text-c-light font-primary font-semibold tracking-wider border border-c-border-thick flex rounded-lg hover:shadow-md transition-hover">
                <a href="#" class="flex-1 px-5 py-1">{{ 'Base Theme' }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
</div>