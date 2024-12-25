<?php

namespace Hascha\BaseTheme\Components\Features\Items;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Stacked extends BaseComponent implements Componentable, FeatureableComponent
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
        return "base::basetheme.features.items.";
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