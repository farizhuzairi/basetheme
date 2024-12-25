<?php

namespace HaschaMedia\BaseTheme\View\BaseLiveComponent\Brand;

use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Builder\Component\BaseLiveComponent;

class Logo extends BaseLiveComponent implements Componentable
{
    public ?string $logo;

    public function baseComponent(): string
    {
        return "base::livewire.brand.";
    }

    public function defaultables()
    {
        return [
            'logo' => themeConfig()->brandLogo(),
        ];
    }
}