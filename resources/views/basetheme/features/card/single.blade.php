<div {{ $attributes->merge(['class' => $attributes->prepends('')]) }}>
    <x-base::card :topBorder="$topBorder" :class="$class">
        <x-base::card.body>
            <x-base::subject
            :subject="$subject ?? null"
            :introduction="$introduction ?? null"
            />
            <x-base::card.content
            :$contents
            />
        </x-base::card.body>
        @if(isset($footer))
        <x-base::card.footer :right="$footer['right'] ?? false">
            <x-slot:content>{{ $footer['content'] }}</x-slot:content>
            @if(isset($footer['buttons']))
            @foreach($footer['buttons'] as $btn)
            <a href="{{ $btn['url'] }}">
                {{ $btn['text'] }}
                <span class="{{ $btn['icon'] }}"></span>
            </a>
            @endforeach
            @endif
        </x-base::card.footer>
        @endif
    </x-base::card>
</div>