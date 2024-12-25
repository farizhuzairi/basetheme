<?php

namespace HaschaMedia\BaseTheme\Components\Features;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Services\ThemeService;
use HaschaMedia\BaseTheme\Features\Traits\Featureable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableLink;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableSubject;
use HaschaMedia\BaseTheme\Traits\Components\SetViewComponent;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

class Description extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    FeatureableLink,
    SetViewComponent;
    
    /**
     * @var string
     */
    protected ?string $description = null;
    protected ?string $image = null;

    /**
     * @return void
     */
    public function construction(ThemeService $service)
    {
        $this->typeOfLite();
    }

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'description' => $this->description,
            'image' => $this->image,
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.descriptions.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "lite";
    }

    /**
     * @return static
     */
    public function typeOfLite()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * Description content
     * @return static
     */
    public function description(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Image
     * @return static
     */
    public function image(string $image)
    {
        $this->image = $image;
        return $this;
    }
}