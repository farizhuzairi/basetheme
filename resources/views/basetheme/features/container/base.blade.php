@props([
    'css' => null
])
<div {{
    $attributes->merge(['class' => $attributes->prepends('base-container py-8')])
    ->merge([
        'class' => $css
    ])
}}>
    @if($subject || $introduction)
    <x-base::title :withBorder="false">
        <x-slot:title>{{ $subject }}</x-slot:title>
        <x-slot:description>{{ $introduction }}</x-slot:description>
    </x-base::title>
    @endif
    <div class="base-flex-spacer">
        <x-base::_contents class="base-flex-spacer" :$contents/>
        <div class="grid grid-cols-6">
            <div class="bg-c-light-thin dark:bg-c-dark-thick text-c-text-thin dark:text-c-light font-primary font-semibold tracking-wider border border-c-border-thick flex rounded-lg hover:shadow-md transition-hover">
                <a href="#" class="flex-1 px-5 py-1">{{ 'Base Theme' }}</a>
            </div>
        </div>
    </div>
</div>