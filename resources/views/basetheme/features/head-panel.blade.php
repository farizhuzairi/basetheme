<div {{
    $attributes->merge(['class' => $attributes->prepends('base-flex bg-c-theme py-5 border-b border-c-dark')])
}}>
<a href="{{ $url ?? '#' }}" id="main-page-title" class="border-s-8 border-primary text-xl font-title font-semibold leading-6 text-slate-300 ps-2 pe-4">
    {{ $title }}
</a>
@if(isset($__subject) || ! empty($subject))
<div class="px-4 mt-1 text-sm text-secondary leading-4 font-sub-title tracking-wide">
    <span class="hascha-minus"></span>
    {{ isset($__subject) ? $__subject : "" }}
    {{ isset($__subject) && ! empty($subject) ? "|" : "" }}
    {{ $subject }}
</div>
@endif
<div class="text-sm text-c-light-dark px-4">{{ $introduction }}</div>
</div>