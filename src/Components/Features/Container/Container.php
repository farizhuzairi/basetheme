<?php

namespace HaschaMedia\BaseTheme\Components\Features\Container;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Services\ThemeService;
use HaschaMedia\BaseTheme\Features\Traits\Featureable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableContent;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableSubject;
use HaschaMedia\BaseTheme\Traits\Components\SetViewComponent;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

class Container extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    FeatureableContent,
    SetViewComponent;

    protected ?string $css = null;

    /**
     * @return void
     */
    public function construction(ThemeService $service)
    {
        $this->typeOfBase();
    }

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'css' => $this->css ?? ''
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
     * Stylesheet Class
     * @return static
     */
    public function css(string $css)
    {
        $this->css = $css;
        return $this;
    }
}