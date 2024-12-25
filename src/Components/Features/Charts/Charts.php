<?php

namespace Hascha\BaseTheme\Components\Features\Charts;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Charts extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    SetViewComponent;

    /**
     * Chart object
     * @var array
     */
    protected $charts = [];

    /**
     * Button Chart as Details Action
     * @var array
     */
    protected $buttons = [];

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'charts' => $this->charts,
            'buttons' => $this->buttons,
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.charts.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "bar";
    }

    /**
     * type of counter
     * @return static
     */
    public function typeOfBar()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * Chart contents: bar
     * @return static
     */
    public function chart(string $label, int $point = 0, ?string $info = null)
    {
        $this->charts[] = [
            'label' => $label,
            'pts' => $point,
            'info' => $info,
        ];
        return $this;
    }

    /**
     * Add Button Chart
     * @return static
     */
    public function button(string $text, string $url)
    {
        $this->buttons[] = [
            'text' => $text,
            'url' => $url,
        ];
        return $this;
    }
}