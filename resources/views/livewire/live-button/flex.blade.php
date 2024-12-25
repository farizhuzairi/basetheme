@php
$_css = '';
if(! empty($this->dto->icon)) {
    $_css = ' flex justify-between gap-1 items-center';
}
@endphp

<x-base::buttons.reset :border="false" class="{{ $this->dto->css . $_css }}" wire:click="{{ $this->dto->withPrevent }}">
    <span>{{ $this->dto->textButton }}</span>
    @if(! empty($this->dto->icon))
    <span class="{{ $this->dto->icon }}"></span>
    @endif
</x-base::buttons.reset>