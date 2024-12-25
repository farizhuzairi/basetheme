<?php

namespace HaschaMedia\BaseTheme\Components\Features\Catalog;

use Closure;
use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Features\Traits\Featureable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableContent;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableSubject;
use HaschaMedia\BaseTheme\Traits\Components\SetViewComponent;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

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