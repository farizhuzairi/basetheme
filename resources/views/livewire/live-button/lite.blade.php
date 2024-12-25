<x-base::buttons.reset :border="false" class="{{ $this->dto->css }} btn-border" wire:click="{{ $this->dto->withPrevent }}">
    @if($this->dto->icon)<span class="{{ $this->dto->icon }}"></span>@endif
    {{ $this->dto->textButton }}
</x-base::buttons.reset>