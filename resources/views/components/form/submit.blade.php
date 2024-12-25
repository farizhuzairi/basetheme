@props([
    'label' => 'Submit'
])
<div class="flex justify-end">
<button {{
    $attributes->merge([
        'class' => $attributes->prepends('ring-0 active:ring-0 outline-none active:outline-none font-poppins transition-all bg-primary text-c-light-thin border border-c-light rounded-lg px-5 py-2')
    ])->merge([
        'type' => 'submit'
    ])
}}>@if(!empty($icon))<span class="{{ $icon }}"></span>@endif
@if($slot->isEmpty()){{ $label }}@else{{ $slot }}@endif
<x-base::load.loader wire:loading wire:target="submit"/>
</button>
</div>