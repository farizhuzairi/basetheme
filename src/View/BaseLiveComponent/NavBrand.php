<?php

namespace HaschaMedia\BaseTheme\View\BaseLiveComponent;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Builder\Component\BaseLiveComponent;

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