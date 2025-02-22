@props([
    'class' => '',
    'route' => Route::has('logout') ? route('logout') : '#',
    'text' => null,
])
<x-base::form method="POST" action="{{ route('logout') }}" x-data>
<a href="{{ $route }}" x-on:click.prevent="$root.submit();" class="{{ $class }}">
    <span class="hascha-sign-out-left"></span>
    {{ $text }}
</a>
</x-base::form>