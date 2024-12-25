<?php

namespace HaschaMedia\BaseTheme\View\BaseLiveComponent\Brand;

use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Builder\Component\BaseLiveComponent;

class Icon extends BaseLiveComponent implements Componentable
{
    public ?string $icon;

    public function baseComponent(): string
    {
        return "base::livewire.brand.";
    }

    public function defaultables()
    {
        return [
            'icon' => null,
        ];
    }
}