<?php

namespace Hascha\BaseTheme\Components\Features\Content;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Dampen extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    SetViewComponent;

    /**
     * Data objects
     * @var array
     */
    protected $properties = [];

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return array_merge($this->properties, []);
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
        return "dampen";
    }
}