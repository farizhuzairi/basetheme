<ul class="mt-5 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
    @for($x=0; $x < 12; $x++)
    <li class="">
        <a href="#">
            <img src="{{ asset('images/products/' . $x + 1 . '.png') }}" alt="" class="rounded-lg">
        </a>
        <div class="bg-slate-800/25 mt-1">
            <h5 class="font-menu text-amber-100">
                <a href="#">{{ 'This Category Product' }}</a>
            </h5>
            <p class="text-xs text-gray-300">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel amet iste ea?
            </p>
        </div>
    </li>
    @endfor
</ul>