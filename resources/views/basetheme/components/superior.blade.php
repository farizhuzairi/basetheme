<div id="superior" class="bg-slate-200 dark:bg-slate-950 py-8">
    <div class="base-container">
        @if(isset($title))<h3 class="empty:hidden font-sub-title">{{ $title }}</h3>@endif
        @if(isset($description))<div class="text-sm">{{ $description }}</div>@endif
        <div class="mt-2 relative">
            <div class="absolute w-full max-h-[50%] bottom-0 bg-slate-800/50 px-4 py-3 rounded-b-lg text-slate-400 overflow-y-hidden">
                <h3 class="font-sub-title text-lg font-medium leading-5">{{ 'Super Content Title' }}</h3>
                <div class="text-sm">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae aliquam recusandae optio itaque labore saepe ullam nulla velit corporis, voluptatem, magni sed?
                </div>
            </div>
            <img src="{{ asset('images/banner1.png') }}" alt="" class="object-cover w-full h-auto rounded-lg">
        </div>
    </div>
</div>