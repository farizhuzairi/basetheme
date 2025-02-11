<div class="h-screen max-w-7xl mx-auto flex flex-col items-center justify-center" x-data="{ flexi: true }" x-cloak>
    <div class="grid grid-cols-12 gap-0 h-screen">
        <div :class="flexi ? 'col-span-12 md:col-span-6 lg:col-span-7 flex relative' : 'hidden'">

            <div class="relative h-screen w-full md:h-auto" x-data="{ tab: false }">
                <div class="absolute right-2 top-1 text-c-light text-lg">
                    <div class="flex flex-wrap gap-2 items-center">
                        <x-base::buttons.reset x-on:click="tab = ! tab"><span class="hascha-table_rows"></span></x-base::buttons.reset>
                    </div>
                </div>
                <div x-show="tab" x-cloak
                    x-transition:enter="transition ease-out duration-300" 
                    x-transition:enter-start="opacity-0 transform scale-y-0" 
                    x-transition:enter-end="opacity-100 transform scale-y-100" 
                    x-transition:leave="transition ease-in duration-300" 
                    x-transition:leave-start="opacity-100 transform scale-y-100" 
                    x-transition:leave-end="opacity-0 transform scale-y-0"
                    x-on:click.away="tab = false" class="absolute bg-c-dark-thin text-c-light-thin h-full w-full flex flex-col gap-3 px-4 py-5">
                    <livewire:nav-brand/>
                    @php
                    foreach(__featureables(\Hascha\BaseTheme\Facade\Features\Sidebar::class, [], 'tab') as $_key => $i) {
                        echo e($i);
                    }
                    @endphp
                    <div class="mt-auto py-8">
                        <x-base::buttons.reset :border="false" x-on:click="tab = ! tab" class="w-full border border-c-light-thick px-3 py-2 rounded-md">Tutup</x-base::buttons.reset>
                    </div>
                </div>
                
                <div class="bg-c-theme text-c-light-thin py-12 h-full shadow flex items-center">
                    <div class="h-auto w-full">
                        @php
                        foreach(__featureables(\Hascha\BaseTheme\Facade\Features\Sidebar::class, [], 'main') as $_key => $i) {
                            echo e($i);
                        }
                        @endphp
                    </div>
                </div>
            </div>
            
            <div class="absolute right-0 bottom-2">
                <x-base::buttons.reset x-on:click="flexi = ! flexi" class="bg-white px-1.5 py-0.5 rounded-s"><span class="hascha-first_page"></span></x-base::buttons.reset>
            </div>
        </div>
        <div :class="flexi ? 'col-span-12 md:col-span-6 lg:col-span-5' : 'col-span-12 relative'" class="bg-white text-c-dark flex items-center">
            <div class="mx-4 lg:mx-8 my-5 base-padding border-e-4 border-primary/25">
                @php echo e($__content['header']); @endphp
                <div class="lg:py-5">
                @php echo e($__content['body']); @endphp
                </div>
            </div>
        </div>
        <div class="absolute left-0 top-3">
            <x-base::buttons.reset x-on:click="flexi = ! flexi" ::class="flexi ? 'hidden' : 'bg-c-theme text-c-light-thin px-1.5 py-0.5 rounded-e'"><span class="hascha-last_page"></span></x-base::buttons.reset>
        </div>
    </div>
</div>