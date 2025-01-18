<?php

namespace Hascha\BaseTheme\Components\Features\Catalog;

use Closure;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableContent;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Gallerion extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableContent,
    FeatureableSubject,
    SetViewComponent;

    protected array $properties = [];
    protected array $items = [];
    protected array $labels = [];

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
        return "base::basetheme.features.catalog.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "gallerion";
    }

    /**
     * type of counter
     * @return static
     */
    public function typeOfGallerion()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * gallery contents
     * @return static
     */
    public function item(
        string $image,
        string $title,
        string $url = '#',
        ?string $introduction = null,
        ?Closure $labels = null
    )
    {
        if($labels instanceof Closure) {
            $labels = $labels($this);
        }

        $this->items[] = [
            'image' => $image,
            'title' => $title,
            'url' => $url,
            'introduction' => $introduction,
            'labels' => $this->labels
        ];

        // resets
        $this->labels = [];

        // return
        return $this;
    }

    /**
     * gallery contents
     * @return static
     */
    public function label(string $title, string|int|bool $label, ?string $icon = null)
    {
        $this->labels[] = [
            'title' => $title,
            'label' => $label,
            'icon' => $icon
        ];

        return $this;
    }
}