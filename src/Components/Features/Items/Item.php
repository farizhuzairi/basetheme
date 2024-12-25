<?php

namespace Hascha\BaseTheme\Components\Features\Items;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Item extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    SetViewComponent;
    
    protected ?string $text;
    protected string $url = '#';
    protected ?string $description;

    // text icons
    protected array $icons = [
        'start' => null,
        'end' => null,
    ];

    /**
     * @return void
     */
    public function construction(ThemeService $service)
    {
        $this->typeOfInfo();
    }

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'text' => $this->text,
            'url' => $this->url,
            'description' => $this->description,
            'icons' => $this->icons,
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.items.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "info";
    }

    /**
     * @return static
     */
    public function typeOfInfo()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * @return static
     */
    public function typeOfAnnotation()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * Item content
     * @return static
     */
    public function item(string $text, string $url = '#', ?string $description = null)
    {
        $this->text = $text;
        $this->url = $url;
        $this->description = $description;
        return $this;
    }

    /**
     * Icons
     * @return static
     */
    public function icons(string $iconStart, ?string $iconEnd = 'hascha-trending_neutral')
    {
        $this->icons = [
            'start' => $iconStart,
            'end' => $iconEnd,
        ];
        return $this;
    }
}