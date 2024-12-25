@php echo e($__content['header']); @endphp
<div class="flex">

<div id="sidebar" class="w-64 h-screen bg-c-dark dark:bg-c-dark text-c-light text-[0.9em] fixed top-0 z-20 hidden md:flex md:flex-col md:gap-0 pt-12">
    @php
    foreach(__featureables(\HaschaMedia\BaseTheme\Facade\Features\Sidebar::class, [], 'headPanel') as $_key => $i) {
        echo e($i);
    }
    @endphp
    <div class="h-full overflow-y-auto pt-3 pb-8 base-flex-space">

        <x-panel::user-panel/>

        @php
        foreach(__featureables(\HaschaMedia\BaseTheme\Facade\Features\Sidebar::class, [], 'main') as $_key => $i) {
            echo e($i);
        }
        @endphp

    </div>

</div>

<div id="main" class="flex flex-col md:ml-64 w-full base-page">
    <div class="base-flex-spacer-max">
    @php echo e($__content['body']); @endphp
    </div>

    <div class="mt-auto bg-c-light/75 dark:bg-c-dark">
    @php echo e($__content['footer']); @endphp
    </div>
</div>

</div>