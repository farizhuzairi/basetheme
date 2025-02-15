<?php

namespace Hascha\BaseTheme\Components\Features\Content;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Features\Traits\WithClasses;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableContent;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Skull extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    FeatureableContent,
    SetViewComponent,
    WithClasses;

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
        return $this->properties;
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
        return "skull";
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
}