@php
$_css = '';
if(! empty($this->dto->icon)) {
    $_css = '';
}
@endphp

<x-base::buttons.reset :border="false" class="{{ $this->dto->css . $_css }}" wire:click="{{ $this->dto->withPrevent }}">
    @if(! empty($this->dto->icon))
    <span class="{{ $this->dto->icon }}"></span>
    @endif
    <span>{{ $this->dto->textButton }}</span>
</x-base::buttons.reset>