@props([
    'footer' => null,
    'typeOf' => null
])
@php
switch($typeOf) {
    case 'theme':
        $typeCss = " text-c-light-thick dark:text-c-text bg-c-theme border-c-light-thick";
        break;
    case 'primary':
        $typeCss = " text-c-text-thick dark:text-c-text bg-primary/25 border-c-light-thick";
        break;
    case 'success':
        $typeCss = " text-c-text-thick dark:text-c-text bg-success/25 border-c-light-thick";
        break;
    case 'danger':
        $typeCss = " text-c-text-thick dark:text-c-text bg-danger/25 border-c-light-thick";
        break;
    case 'info':
        $typeCss = " text-c-text-thick dark:text-c-text bg-info/25 border-c-light-thick";
        break;
    case 'warning':
        $typeCss = " text-c-text-thick dark:text-c-text bg-warning/25 border-c-light-thick";
        break;
    default:
        $typeCss = " text-c-text-thin dark:text-c-text-thick bg-c-light-thin dark:bg-c-light-thick border-c-light-thick dark:border-c-border-thick";
        break;
}
@endphp
<div class="mb-5 me-5 bg-c-theme dark:bg-c-light rounded-md border-s border-c-border dark:border-c-border-deep">
    <div class="ms-3 translate-y-5 translate-x-2 bg-white rounded">
        <blockquote border-c-border dark:border-c-border-deep {{
            $attributes->merge(['class' => $attributes->prepends('font-primary px-3 py-5 rounded border border-s-4 shadow' . $typeCss)])
        }}>
            {{ $slot }}
            @if($footer)
            <div {{
                $footer->attributes->merge(['class' => $attributes->prepends('mt-5 font-light font-bubbles')])
            }}>{{ $footer }}</div>
            @endif
        </blockquote>
    </div>
</div>