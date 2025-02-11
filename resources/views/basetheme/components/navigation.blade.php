<div {{
    $attributes->merge(['class' => $attributes->prepends('py-3 flex justify-between md:grid md:grid-cols-12 gap-1 md:gap-0')])
}}>
    <div class="md:col-span-10 base-flex-wrap-space items-center">
        @if($slot->isEmpty())
        <livewire:nav-brand/>
        @php
        foreach(__featureables(\Hascha\BaseTheme\Facade\Features\Content::class, ['navMenu'], 'header') as $_key => $i) {
            echo e($i);
        }
        @endphp
        @else
        {{ $slot }}
        @endif
    </div>
    <div class="md:col-span-2 flex flex-wrap gap-3 md:gap-3 items-center md:justify-end">

        <livewire:search-bar/>

        @if($__notifications && Auth::check())
        <x-buttons::index
        :icon="'hascha-notifications'"
        />
        @endif

        <div class="relative" x-data="{ userTab: false }">
            @if($__userMenu && Auth::check())
            <x-buttons::index x-on:click="userTab = ! userTab"
            :icon="'hascha-user-circle-1'"
            />
            <div x-show="userTab" x-cloak x-transition x-on:click.away="userTab = false" class="absolute bg-c-light-thin text-sm text-c-text border border-c-border font-sub-menu right-0 w-52 rounded shadow-lg z-50">
                <ul class="divide-y divide-c-light">
                    <li>
                        <a href="" class="block px-3 py-2 leading-4 hover:bg-c-light first:rounded-t">
                            <span class="block text-xs font-light">{{ Auth::user()->email }}</span>
                            <span class="font-primary font-semibold tracking-wide">{{ Auth::user()->name }}</span>
                        </a>
                    </li>
                    <li>
                        <x-base::darkmode :withText="true"/>
                    </li>
                    <li>
                        <x-base::form method="POST" action="{{ route('logout') }}" x-data>
                        <a href="" x-on:click.prevent="$root.submit();" class="block px-3 py-2 hover:bg-c-light last:rounded-b">
                            <span class="hascha-sign-out-left"></span>
                            {{ 'Logout' }}
                        </a>
                        </x-base::form>
                    </li>
                </ul>
            </div>
            @else
            <x-buttons::index
            text="Login"
            icon="hascha-true-sign-in"
            typeOf="link"
            :url="Route::has('login') ? route('login') : '#'"
            />
            @endif
        </div>

        <x-base::darkmode :isRendered="! Auth::check()"/>
        
    </div>
</div>