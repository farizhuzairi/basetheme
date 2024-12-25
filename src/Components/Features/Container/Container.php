<?php

namespace Hascha\BaseTheme\Components\Features\Container;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Features\Traits\Featureable;
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