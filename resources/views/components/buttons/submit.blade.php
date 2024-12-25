@props([
    'value' => 'Submit'
])
<button {{
    $attributes->merge([
        'class' => $attributes->prepends('ring-0 active:ring-0 outline-none active:outline-none text-[0.85em] transition-all'),
        'type' => $btnType ?? 'submit'
    ])
}}>@if(!empty($icon))<span class="hascha-{{ $icon }}"></span>@endif
@if($slot->isEmpty()){{ $value }}@else{{ $slot }}@endif
</button>