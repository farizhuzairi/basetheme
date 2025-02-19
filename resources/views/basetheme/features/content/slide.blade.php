@props(__props_class(__props_readmore([
    'title' => null,
    'description' => null,
    'items' => []
])))
<div {{
    $attributes->merge(['class' => $attributes->prepends('bg-secondary dark:bg-gradient-to-r dark:from-primary dark:to-c-theme')])
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
            @if($description)<p class="text-c-text-thin dark:text-c-text-light font-sans leading-5">{{ $description }}</p>@endif
            @if($fill)
            <div class="mt-3">
                @if($fill['type'] === 'icon')
                <span class="{{ $fill['fill'] }} text-5xl {{ $fill['css'] ?? 'text-c-text-thin dark:text-secondary' }}"></span>
                @else
                <img src="{{ $fill['fill'] }}" alt="fill image Slide Headline" class="rounded">
                @endif
            </div>
            @endif
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
                        <div class="w-full lg:w-1/3 flex-shrink-0 py-1 px-4">
                            <div class="bg-white dark:bg-c-light-thin text-c-text shadow-lg rounded-lg text-center h-full flex justify-center items-center">
                                <a href="" class="px-3 py-5">
                                    @if($i['fill'])
                                    <div class="flex justify-center items-center mb-1">
                                        @if($i['fill']['type'] === 'icon')
                                        <span class="{{ $i['fill']['fill'] }} text-4xl {{ $i['fill']['css'] ?? 'text-c-light-thick' }}"></span>
                                        @else
                                        <img src="{{ $i['fill']['fill'] }}" alt="Slide Image, {{ $i['title'] }}" class="rounded">
                                        @endif
                                    </div>
                                    @endif
                                    <h2 class="text-base font-sans font-semibold leading-5 mb-1">{{ $i['title'] }}</h2>
                                    <p class="text-c-text-thin text-xs leading-4">{{ $i['description'] }}</p>
                                </a>
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
            <div class="flex justify-center items-center mt-3 space-x-2">
                <template x-for="(dot, index) in totalDots" :key="index">
                    <button @click="activeIndex = index * visibleCards"
                        :class="activeIndex === index * visibleCards ? 'bg-c-dark' : 'bg-c-light'"
                        class="w-3 h-3 border border-c-border rounded-full transition-all"></button>
                </template>
                @if($readmore)
                <a href="{{ $readmore['url'] }}" class="text-xs text-secondary hover:text-primary transition-all dark:text-c-text-light">
                    @if(!empty($readmore['icon']))<span class="{{ $readmore['icon'] }}"></span>@endif
                    {{ $readmore['text'] }}
                </a>
                @endif
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
            this.activeIndex = (this.activeIndex > 0) ? this.activeIndex - this.visibleCards : this.items.length - this.visibleCards;
        },
        next() {
            this.activeIndex = (this.activeIndex < this.items.length - this.visibleCards) ? this.activeIndex + this.visibleCards : 0;
        },

        updateVisibleCards() {
            if (!this.items || this.items.length === 0) {
                this.visibleCards = 1;
                this.totalDots = 0;
                return;
            }

            if (window.innerWidth < 640) {
                this.visibleCards = 1;
            } else if (window.innerWidth < 1024) {
                this.visibleCards = 1;
            } else {
                this.visibleCards = 3;
            }

            this.totalDots = Math.ceil(this.items.length / this.visibleCards);

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

            this.startAutoSlide();
        }
    };
}
</script>
@endpush