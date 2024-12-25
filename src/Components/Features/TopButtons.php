<?php

namespace Hascha\BaseTheme\Components\Features;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

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