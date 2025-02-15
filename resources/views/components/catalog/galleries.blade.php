@props(__props_class([
    'items' => []
]))

@php
$box = '';
if($withBox) {
    $box .= 'border border-c-border-thick px-1 py-1 rounded';

    switch ($boxColor) {
        case 'white':
            $box .= ' bg-white text-c-text';
            break;
        case 'light':
            $box .= ' bg-c-light text-c-text';
            break;
        case 'dark':
            $box .= ' bg-c-dark text-c-light-thin';
            break;
        default:
            $box .= ' bg-c-light text-c-text';
            break;
    }
}
@endphp
<ul {{
    $attributes->merge(['class' => $attributes->prepends('mt-5 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5')])
}}>
    @foreach($items as $key => $item)
    <li class="{{ $box }}">
        <div class="bg-c-light rounded shadow hover:scale-105 transition-all">
            <a href="{{ $item['url'] }}">
                <img src="{{ $item['image'] }}" alt="{{ 'gallery image: ' . $item['title'] }}" class="rounded">
            </a>
        </div>
        <div class="mt-1 bg-c-dark-thick px-2 py-3 rounded shadow text-c-text-light">
            <h5 class="font-menu text-c-light-thin hover:text-c-light transition-all">
                <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
            </h5>
            @if($item['introduction'])<p class="text-xs">{{ $item['introduction'] }}</p>@endif
            @if($item['labels'])
            <ul class="base-flex mb-2">
                @foreach($item['labels'] as $label)
                <li class="font-medium basefont-price text-sm">
                    @if($label['icon'])<span class="{{ $label['icon'] }}"></span>@endif
                    <span>{{ $label['title'] }}</span>
                    <span class="text-base">{{ $label['label'] }}</span>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </li>
    @endforeach
</ul>