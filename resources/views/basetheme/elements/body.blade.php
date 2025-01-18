<div id="body" {{ $attributes->merge(['class' => $attributes->prepends($theme === 'panel' ? 'min-h-[90vh] flex flex-col pt-10 lg:pt-12 dark:bg-c-dark-thin' : 'h-full')]) }}>
    @if($theme === 'panel')
    <x-panel::body/>
    @else
    @php
    foreach(__featureables(\Hascha\BaseTheme\Facade\Features\Content::class, [], 'main') as $_key => $i) {
        echo e($i);
    }
    @endphp
    {{-- <x-base-component::superior/>
    <x-base::jumbotron.index/>
    <x-base-component::base-catalog/> --}}
    @endif

    @if(request()->routeIs('dev.basetheme'))
    <x-drip-content
    title="Base Theme"
    label="Development Package"
    section="base"
    >
        <x-slot:main class="base-flex-spacer">
            <x-base::quotes>
                {!! '<b>BaseTheme</b> dibangun untuk mendukung pengembangan aplikasi berbasis website agar lebih cepat dan efisien. Pengembang dapat lebih fokus untuk pekerjaan utama dalam membangun logika aplikasi yang kuat dan sesegera mungkin mengimplementasikan bisnis mereka tanpa perlu lagi menuliskan teks "Hello World!"' !!}
            </x-base::quotes>
            <x-base::blockquote typeOf="primary">
                {{ 'Menampilkan data secara dimanis dan dapat digunakan berulang kali (reuseable) ke dalam setiap halaman website menggunakan Tema Dasar yang dapat dikostumisasi berbasis Laravel.' }}
                <x-slot:footer>{{ '-- Hascha Media @2024' }}</x-slot:footer>
            </x-base::blockquote>

            <!-- contents -->
            <div class="base-flex-spacer-long">
                <div class="">
                    <x-base::subject fontSize="lg"
                    subject="Perkenalan"
                    introduction="Mendukung pengembangan aplikasi berbasis website."
                    />
                    <div class="base-flex-space">
                        <p>
                            {{ 'Dibangun menggunakan konsep dasar Blade Component.' }}
                        </p>
                        <p>
                            {{ 'Mempersiapkan halaman dengan dukungan Routing Package.' }}
                        </p>
                        <p>
                            {{ 'Setiap halaman atau tampilan selalu mereferensikan Kelas Model Tema (Theme Model Class) sebagai model utama untuk menghasilkan struktur halaman secara utuh.' }}
                        </p>
                        <p>
                            {{ 'Setiap Theme Model dapat digunakan untuk satu atau beberapa halaman terkait dengan kesamaan tema dasar yang sesuai.' }}
                        </p>
                    </div>
                </div>
                <div>
                    <x-base::subject fontSize="lg"
                    subject="Tema Halaman"
                    introduction="Setiap tema dapat digunakan sebanyak mungkin sesuai yang diperlukan tanpa perlu membuat model tema berulang."
                    />
                    <div class="base-flex-space">
                        <p></p>
                    </div>
                </div>
            </div>
            <!-- end. contents -->
            
        </x-slot:main>
        <x-slot:aside>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque asperiores voluptates inventore, beatae molestiae accusantium cupiditate velit sit itaque! Optio velit doloribus commodi facere dicta? Omnis hic tenetur ratione aliquid, quas nam tempora labore officia, mollitia, vero architecto?
        </x-slot:aside>
    </x-drip-content>
    @endif

    <x-base-component::extra-content/>
</div>