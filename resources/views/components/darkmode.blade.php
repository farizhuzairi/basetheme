@props([
    'isRendered' => true,
    'withText' => false
])
@php
$display = $__useDarkMode ?? false;
$display = $display && $isRendered ? true : false;
$css = "";
if($withText) {
    $css = "w-full flex items-center justify-start gap-1 px-3 py-2 hover:bg-c-light";
}
@endphp
@if($display)
<x-buttons::index @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light'); document.documentElement.classList.toggle('dark', darkMode);" typeOf="reset" class="{{ $css }}">
    <span :class="darkMode ? 'hascha-wb_sunny' : 'hascha-brightness_2'"></span>
    @if($withText)
    <span x-text="darkMode ? 'Mode Terang' : 'Mode Gelap'"></span>
    @endif
</x-buttons::index>
@endif