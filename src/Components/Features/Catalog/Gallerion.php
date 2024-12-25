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
}