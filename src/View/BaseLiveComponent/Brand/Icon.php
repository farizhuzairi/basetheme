<?php

namespace Hascha\BaseTheme\View\BaseLiveComponent\Brand;

use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Builder\Component\BaseLiveComponent;

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