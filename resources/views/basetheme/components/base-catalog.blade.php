<div id="base-catalog" class="bg-slate-200/25 dark:bg-slate-200 text-slate-700 dark:text-slate-800">
    <div class="border-y border-slate-300/75 bg-cyan-900 text-slate-300">
        <div class="base-container">
            <div class="flex flex-nowrap gap-0 items-center">
                <h3 class="font-sub-title font-medium lg-size bg-cyan-950/50 hover:bg-cyan-950/75 transition-all whitespace-nowrap shadow">
                    <a href="#" class="block px-3 py-2">{{ 'Catalog Title' }}</a>
                </h3>
                <div class="flex flex-nowrap gap-0 items-center divide-x divide-cyan-950 overflow-x-auto">
                    <a href="#" class="px-5 py-2 hover:text-cyan-100 whitespace-nowrap">
                        <span class="hascha-label-1"></span>
                        {{ 'One Categories' }}
                    </a>
                    <a href="#" class="px-5 py-2 hover:text-cyan-100 whitespace-nowrap">
                        <span class="hascha-label-1"></span>
                        {{ 'Latest Cat Two' }}
                    </a>
                    <a href="#" class="px-5 py-2 hover:text-cyan-100 whitespace-nowrap">
                        <span class="hascha-label-1"></span>
                        {{ 'New Products' }}
                    </a>
                    <a href="#" class="px-5 py-2 hover:text-cyan-100 whitespace-nowrap">
                        <span class="hascha-label-1"></span>
                        {{ 'Three Command Voucher' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="base-container">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-5 py-5">
            @for($x=0; $x < 12; $x++)
            <div class="border border-transparent group">
                <a href="#" class="block bg-white rounded-lg">
                    <img src="{{ asset('images/products/' . $x + 1 . '.png') }}" alt="" class="rounded-lg group-hover:shadow transition-all border border-slate-300">
                </a>
                <div class="mt-1">
                    <h5 class="font-menu font-medium text-amber-900 group-hover:text-amber-800">
                        <a href="#">{{ 'This Category Product' }}</a>
                    </h5>
                    <p class="text-xs">
                        <span class="hascha-star1"></span><span class="hascha-star1"></span><span class="hascha-star1"></span><span class="hascha-star1"></span><span class="hascha-star_half"></span>
                        <span class="">{{ '3/5' }}</span>
                        <span class="">{{ '(137 terjual)' }}</span>
                    </p>
                    <p class="font-lato font-semibold">
                        <span class="text-xs">{{ 'Rp' }}</span>
                        <span class="text-lg">{{ '100.000' }}</span>
                    </p>
                    <div class="lg:flex lg:flex-row lg:justify-between lg:gap-2 lg:items-center">
                        <span class="inline-block bg-red-800/25 text-red-800 text-xs font-medium font-rubik px-2 py-0.5 rounded whitespace-nowrap">
                            <span class="hascha-discount-flash"></span>
                            {{ 'Hot Sale' }}
                        </span>
                        <span class="inline-block text-xs leading-4">
                            <span class="font-semibold">{{ 'Toko' }}</span>
                            <span class="hascha-pin_drop"></span>
                            {{ 'Jakarta' }}
                        </span>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>