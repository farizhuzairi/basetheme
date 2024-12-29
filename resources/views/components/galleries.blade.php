<ul class="mt-5 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
    @for($x=0; $x < 12; $x++)
    <li>
        <a href="#">
            <img src="{{ asset('images/products/' . $x + 1 . '.png') }}" alt="" class="rounded-lg">
        </a>
        <div class="mt-1">
            <h5 class="font-menu">
                <a href="#">{{ 'This Category Product (Example)' }}</a>
            </h5>
            <p class="text-xs">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel amet iste ea?
            </p>
        </div>
    </li>
    @endfor
</ul>