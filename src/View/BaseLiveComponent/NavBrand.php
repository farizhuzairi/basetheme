<?php

namespace Hascha\BaseTheme\View\BaseLiveComponent;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Builder\Component\BaseLiveComponent;

class NavBrand extends BaseLiveComponent implements Componentable
{
    use Explained;

    public ?string $brandMenu;
    public ?string $logo;
    public ?string $icon;
    public ?string $url;
    public bool $showLogo = true;
    public bool $withIcon = false;

    public function baseComponent(): string
    {
        return "base::livewire.";
    }

    public function defaultables()
    {
        return [
            'brandMenu' => themeConfig()->brandName(),
            'logo' => themeConfig()->brandLogo(),
            'icon' => null,
            'url' => config('app.url'),
        ];
    }
}