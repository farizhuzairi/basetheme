<?php

namespace Hascha\BaseTheme\View\BaseLiveComponent\Brand;

use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Builder\Component\BaseLiveComponent;

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