@props(__props_class([
    'title' => null,
    'description' => null,
    'items' => []
]))
<div {{
    $attributes->merge(['class' => $attributes->prepends('bg-gradient-to-r from-c-light dark:from-c-dark via-c-light-thin dark:via-c-light-thick to-c-theme text-c-text dark:text-c-text-white')])
    ->merge([
        'class' => $class,
        'style' => $style,
    ])
}}>
    <div class="base-container py-12 grid grid-cols-12 gap-5 lg:gap-3 items-center">
        @if($subject)
        <div class="col-span-12">
            <h2 class="font-title leading-5">{{ $subject }}</h2>
            @if($introduction)<p class="text-xs font-normal">{{ $introduction }}</p>@endif
        </div>
        @endif
        @if($title || $description)
        <div class="col-span-12 md:col-span-6 lg:col-span-4 h-full">
            @if($title)<h3 class="font-semibold font-title text-2xl">{{ $title }}</h3>@endif
            @if($description)<p class="font-sans leading-5">{{ $description }}</p>@endif
        </div>
        @endif
        <div x-data="carouselData({{ json_encode($items) }})"
            x-init="init()"
            @mouseenter="stopAutoSlide()" 
            @mouseleave="startAutoSlide()"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
            class="col-span-12 md:col-span-6 lg:col-span-8 relative w-full overflow-hidden {{ empty($title) && empty($description) ? 'md:col-start-4 lg:col-start-3' : '' }}">
    
            <!-- Container -->
            <div class="relative overflow-hidden w-full">
                <div class="flex transition-transform duration-500 ease-out"
                    :style="'transform: translateX(-' + activeIndex * (100 / visibleCards) + '%)'">
    
                    @foreach ($items as $i)
                        <div class="w-full lg:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-white dark:bg-c-light-thin text-c-text shadow-lg rounded-lg p-6 text-center">
                                <div class="flex justify-center items-center text-5xl text-c-text-light font-light mb-1"><span class="hascha-layers1"></span></div>
                                <h2 class="text-base font-title font-semibold">{{ $i['title'] }}</h2>
                                <p class="text-c-text-light text-sm">{{ $i['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
    
                </div>
            </div>
    
            <!-- Tombol Navigasi -->
            <button @click="prev()" class="absolute lg:hidden top-1/2 left-0 transform -translate-y-1/2 btn-reset">
                &#10094;
            </button>
            <button @click="next()" class="absolute top-1/2 right-0 transform -translate-y-1/2 btn-reset">
                &#10095;
            </button>
    
            <!-- Dots Indicator -->
            <div class="flex justify-center mt-3 space-x-2">
                <template x-for="(dot, index) in totalDots" :key="index">
                    <button @click="activeIndex = index * visibleCards"
                        :class="activeIndex === index * visibleCards ? 'bg-c-dark' : 'bg-c-light'"
                        class="w-3 h-3 border border-c-border rounded-full transition-all"></button>
                </template>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function carouselData(items) {
        return {
            items: items,
            activeIndex: 0,
            visibleCards: 3, 
            totalDots: Math.ceil(items.length / 3),
            interval: null,
            touchStartX: 0,
            touchEndX: 0,

            startAutoSlide() {
                this.interval = setInterval(() => {
                    this.next();
                }, 10000);
            },

            stopAutoSlide() {
                clearInterval(this.interval);
            },

            prev() {
                this.activeIndex = (this.activeIndex > 0) ? this.activeIndex - 3 : this.items.length - this.visibleCards;
            },
            next() {
                this.activeIndex = (this.activeIndex < this.items.length - this.visibleCards) ? this.activeIndex + 3 : 0;
            },

            updateVisibleCards() {
                if (!this.items || this.items.length === 0) {
                    this.visibleCards = 1;
                    this.totalDots = 0;
                    return;
                }

                // Menyesuaikan jumlah card berdasarkan ukuran layar
                if (window.innerWidth < 640) {
                    this.visibleCards = 1;
                } else if (window.innerWidth < 1024) {
                    this.visibleCards = 1;
                } else {
                    this.visibleCards = 3;
                }

                this.totalDots = Math.ceil(this.items.length / this.visibleCards);

                // Reset activeIndex jika melebihi jumlah total item
                if (this.activeIndex >= this.items.length) {
                    this.activeIndex = 0;
                }
            },

            handleTouchStart(event) {
                this.touchStartX = event.touches[0].clientX;
            },

            handleTouchEnd(event) {
                this.touchEndX = event.changedTouches[0].clientX;
                this.detectSwipe();
            },

            detectSwipe() {
                let swipeDistance = this.touchStartX - this.touchEndX;

                if (swipeDistance > 50) {
                    this.next();
                } else if (swipeDistance < -50) {
                    this.prev();
                }
            },

            init() {
                this.updateVisibleCards();
                window.addEventListener('resize', () => this.updateVisibleCards());

                // Pastikan autoslide berjalan setelah semua dihitung
                this.startAutoSlide();
            }
        };
    }
</script>
@endpush