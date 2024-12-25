<?php

namespace HaschaMedia\BaseTheme\Components\Features;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Services\ThemeService;
use HaschaMedia\BaseTheme\Features\Traits\Featureable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Traits\Components\SetViewComponent;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

class TopButtons extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    SetViewComponent;
    
    /**
     * Data Tags
     * @var array
     */
    protected array $buttons = [];

    /**
     * @return void
     */
    public function construction(ThemeService $service)
    {
        $this->typeOfTop();
    }

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'buttons' => $this->buttons,
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.buttons.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "top";
    }

    /**
     * @return static
     */
    public function typeOfTop()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * @return static
     */
    public function button(array|string $text, string $url, ?string $icon = null, string $typeOf = 'lite')
    {
        $this->buttons[] = [
            'typeOf' => $typeOf,
            'text' => $text,
            'url' => $url,
            'icon' => $icon,
        ];
        return $this;
    }
}