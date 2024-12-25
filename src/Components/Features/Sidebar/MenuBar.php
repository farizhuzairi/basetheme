<?php

namespace HaschaMedia\BaseTheme\Components\Features\Sidebar;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Services\ThemeService;
use HaschaMedia\BaseTheme\Features\Traits\Featureable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

class MenuBar extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable;
    
    protected array $items = [];

    /**
     * @return void
     */
    public function construction(ThemeService $service)
    {
        //
    }

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'items' => $this->items
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.side-menu.";
    }

    /**
     * Item content
     * @return static
     */
    public function item(string $title, string $url = '#', ?string $description = null)
    {
        $this->items[] = [
            'title' => $title,
            'url' => $url,
            'description' => $description,
        ];
        return $this;
    }
}