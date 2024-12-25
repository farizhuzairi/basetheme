<?php

namespace HaschaMedia\BaseTheme\View\BaseLiveComponent\Brand;

use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Builder\Component\BaseLiveComponent;

class Name extends BaseLiveComponent implements Componentable
{
    public ?string $name;

    public function baseComponent(): string
    {
        return "base::livewire.brand.";
    }

    public function defaultables()
    {
        return [
            'name' => themeConfig()->brandName(),
        ];
    }
}