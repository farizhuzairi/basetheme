@props([
    'items' => []
])

<ul {{
    $attributes->merge(['class' => $attributes->prepends('mt-5 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5')])
}}>
    @foreach($items as $key => $item)
    <li>
        <a href="{{ $item['url'] }}">
            <img src="{{ $item['image'] }}" alt="{{ 'gallery image: ' . $item['title'] }}" class="rounded-lg">
        </a>
        <div class="mt-1">
            <h5 class="font-menu font-semibold">
                <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
            </h5>
            @if($item['introduction'])<p class="text-xs">{{ $item['introduction'] }}</p>@endif
            @if($item['labels'])
            <ul class="base-flex mb-2">
                @foreach($item['labels'] as $label)
                <li class="font-medium basefont-price text-sm">
                    @if($label['icon'])<span class="{{ $label['icon'] }}"></span>@endif
                    <span class="">{{ $label['title'] }}</span>
                    <span class="text-base">{{ $label['label'] }}</span>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </li>
    @endforeach
</ul>