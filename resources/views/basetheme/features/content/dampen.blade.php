@props(__props_class())
<div class="base-flex-space">
    <div class="flex justify-center mb-8">
        <h2 class="font-title font-semibold text-xl leading-4">{{ 'Sesuaikan Kebutuhan Bisnis' }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-0">
        @for($x=0; $x < 3; $x++)
        <div class="col-span-12 md:col-span-4 base-flex min-h-96 text-c-text-thin hover:text-c-text-white bg-white hover:bg-c-theme border border-c-border hover:border-c-border p-5 hover:scale-105 hover:shadow-lg hover:-translate-y-3 hover:rounded-lg hover:outline hover:outline-offset-2 hover:outline-1 hover:outline-c-theme transition duration-300 ease-in group">
            <h3 class="font-menu font-semibold text-lg">
                {{ 'Lite Service' }}
                <span class="text-xs font-light">{{ 'License' }}</span>
            </h3>
            <div class="mt-3 mb-5 text-sm base-flex-spacer">
                <ul>
                    <li>
                        <span class="hascha-check"></span>
                        Lorem ipsum dolor sit amet consectetur.
                    </li>
                    <li>
                        <span class="hascha-check"></span>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus est aut ipsam.
                    </li>
                    <li>
                        <span class="hascha-check"></span>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate nemo quo consectetur repudiandae repellendus ex laudantium.
                    </li>
                    <li>
                        <span class="hascha-check"></span>
                        Lorem ipsum dolor sit.
                    </li>
                </ul>
            </div>
            <div class="mt-auto flex flex-col items-center justify-center">
                <div class="">
                    <span class="font-semibold text-sm">{{ 'Rp 1.000.000' }}</span>
                    <span class="text-xs">{{ 'per month' }}</span>
                </div>
                <x-buttons::index
                text="Lisensi"
                typeOf="case"
                icon="hascha-lock_open"
                class="text-xs"
                url="#case"
                themeColor="base"
                />
                <div>
                    <a href="" class="text-xs text-c-text-light group-hover:text-c-text-thin hover:underline">
                        {{ 'Pelajari fitur selengkapnya' }}
                        <span class="hascha-trending_neutral"></span>
                    </a>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>