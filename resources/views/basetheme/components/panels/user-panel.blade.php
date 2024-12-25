<div id="user-panel" class="empty:hidden">
    @if($container)
    <div class="base-flex-thin">
        <div class="mx-4 flex flex-row gap-1">
            <div class="basis-1/5">
                <img src="{{ $image }}" alt="" class="w-10 h-10 rounded shadow">
            </div>
            <div class="basis-4/5 base-flex cursor-pointer">
                @if($title)<h5 class="text-sm font-rubik leading-4">{{ $title }}</h5>@endif
                @foreach($labels as $label)
                <span class="text-xs">
                    @if($label['icon'])<span class="hascha-{{ $label['icon'] }}"></span>@endif
                    {{ $label['text'] }}
                </span>
                @endforeach
            </div>
        </div>
        <div class="font-sans px-4 py-1">
            <div class="flex justify-between text-slate-500 mb-1">
                <span class="text-xs">{{ 'Growth' }}</span>
                <span class="hascha-trending_up"></span>
            </div>
            <div class="text-sm font-sans">
                <div class="flex justify-between gap-2">
                    <span>{{ 'Saldo' }}</span>
                    <div>
                        {{ 'Rp' }}
                        <span>{{ '0' }}</span>
                    </div>
                </div>
                <div class="flex justify-between gap-2">
                    <span>{{ 'E-Koin' }}</span>
                    <div>
                        <span class="hascha-coins"></span>
                        <span>{{ '187.236' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>