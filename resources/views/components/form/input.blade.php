@props([
    'label' => null,
    'type' => 'text',
    'id' => null,
    'name' => null,
])

<label class="font-primary" for="{{ $id }}">
    @if($label)<span class="text-c-text-thin">{{ $label }}</span>@endif
    <input spellcheck="false" autocomplete="off" {{
        $attributes->merge(['class' => $attributes->prepends('border border-c-light focus:border-c-light-thick outline-none focus:outline-none ring-0 focus:ring-0 transition-all delay-150 font-primary text-c-text-thin focus:text-c-text-thick rounded-lg w-full placeholder:text-c-light placeholder:font-theme')])->merge([
            'type' => $type,
            'id' => $id,
            'name' => $name
        ])
    }}/>
    @error('form.' . $name)
    <div class="flex justify-between items-center gap-1 text-error font-sans text-sm font-light">
        {{ $message }}
        <span class="hascha-warning text-error/75"></span>
    </div>
    @enderror
</label>