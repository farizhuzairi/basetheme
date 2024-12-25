<div {{
    $attributes->merge(['class' => $attributes->prepends('text-c-text dark:text-c-light font-lato tracking-wider')])
}}>
    <span class="hascha-format_quote text-xl"></span>
    {{ $slot }}
</div>