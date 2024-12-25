<?php

namespace Hascha\BaseTheme\Components\Features;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

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