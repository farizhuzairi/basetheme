<?php

namespace Hascha\BaseTheme\Components\Features\Container;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Features\Traits\WithClasses;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableContent;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Container extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    FeatureableContent,
    SetViewComponent,
    WithClasses;

    protected ?string $css = null;
    protected bool $withPadding = true;
    protected bool $withButton = false;

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'css' => $this->css,
            'withPadding' => $this->withPadding,
            'withButton' => $this->withButton,
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.container.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "base";
    }

    /**
     * type of counter
     * @return static
     */
    public function typeOfBase()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * With Padding (Base Container)
     * @return static
     */
    public function withPadding(bool $withPadding = true)
    {
        $this->withPadding = $withPadding;
        return $this;
    }

    /**
     * With Button (Base Container)
     * @return static
     */
    public function withButton(bool $withButton = false)
    {
        $this->withButton = $withButton;
        return $this;
    }
}