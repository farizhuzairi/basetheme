<?php

namespace HaschaMedia\BaseTheme\Components\Features;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Services\ThemeService;
use HaschaMedia\BaseTheme\Features\Traits\Featureable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Traits\Components\SetViewComponent;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

class Image extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    SetViewComponent;
    
    protected string $src = "";
    protected ?string $alt = null;

    /**
     * @return void
     */
    public function construction(ThemeService $service)
    {
        $this->typeOfImage();
    }

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'key' => \Illuminate\Support\Str::uuid(),
            'src' => $this->src,
            'alt' => $this->alt,
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "image";
    }

    /**
     * @return static
     */
    public function typeOfImage()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * Item content
     * @return static
     */
    public function img(string $src, ?string $alt = null)
    {
        $this->src = $src;
        $this->alt = $alt;
        return $this;
    }
}