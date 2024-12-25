<?php

namespace Hascha\BaseTheme\Components\Features\Events;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class PromotionBag extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject;
    
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
            'items' => $this->items,
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.events.";
    }

    /**
     * Item content
     * @return static
     */
    public function item(string $image, string $title, ?string $description = null, string $url = '#')
    {
        $this->items[] = [
            'image' => $image,
            'title' => $title,
            'description' => $description,
            'url' => $url,
        ];
        return $this;
    }
}