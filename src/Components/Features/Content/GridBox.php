<?php

namespace Hascha\BaseTheme\Components\Features\Content;

use Closure;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\WithButton;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Features\Traits\WithClasses;
use Hascha\BaseTheme\Features\Traits\WithGridable;
use Hascha\BaseTheme\Features\Traits\WithThemeColor;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class GridBox extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    SetViewComponent,
    WithClasses,
    WithThemeColor,
    WithGridable,
    WithButton;

    /**
     * Data objects
     * @var array
     */
    protected $properties = [];

    /**
     * Data Items
     * @var array
     */
    protected $items = [];

    /**
     * Item Data
     * @var array
     */
    protected $itemData = [];

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return array_merge($this->properties, [
            'items' => $this->items
        ]);
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.content.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "grid-box";
    }

    /**
     * type of skull
     * @return static
     */
    public function typeOfSkull()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * Data items
     * @return static
     */
    public function item(string $title, string $description, string|Closure $icon = 'hascha-star', string|Closure $iconColor = 'warning', ?Closure $class = null)
    {
        if($icon instanceof Closure) {
            $class = $icon;
            $icon = 'hascha-star';
        }

        if($iconColor instanceof Closure) {
            $class = $iconColor;
            $iconColor = 'warning';
        }

        $class = !empty($class) ? $class($this) : null;

        $this->items[] = [
            'title' => $title,
            'description' => $description,
            'icon' => $icon,
            'iconColor' => $iconColor,
            'class' => $this->itemData['class'] ?? null,
            'buttonText' => $this->buttonText,
        ];

        $this->itemData = [];
        $this->buttonText = 'Button';
        return $this;
    }

    /**
     * Custom Button
     * @return static
     */
    public function buttonColor(string $color)
    {
        $this->themeColor($color);
        return $this;
    }

    /**
     * Item Property Data
     * @return static
     */
    public function propertable(string $class)
    {
        $this->itemData = [
            'class' => $class
        ];
        return $this;
    }
}