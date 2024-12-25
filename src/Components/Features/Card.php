<?php

namespace Hascha\BaseTheme\Components\Features;

use Closure;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableContent;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Card extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableContent,
    FeatureableSubject,
    SetViewComponent;

    /**
     * card objects
     * @var array
     */
    protected $properties = [];

    protected array $buttons = [];
    protected bool $textRight = false;

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
        return "base::basetheme.features.card.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "single";
    }

    /**
     * type of counter
     * @return static
     */
    public function typeOfSingle(string $border = null)
    {
        $this->setBorder($border);
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    protected function setBorder(?string $border)
    {
        $this->properties['topBorder'] = $border;
    }

    /**
     * Foot Card: Button
     * @return static
     */
    public function button(string $text, string $url = '#', ?string $icon = 'hascha-trending_neutral')
    {
        $this->buttons[] = [
            'text' => $text,
            'url' => $url,
            'icon' => $icon
        ];
        return $this;
    }

    /**
     * text right setup
     * @return static
     */
    public function right(bool $right = true)
    {
        $this->textRight = $right;
        return $this;
    }

    /**
     * Foot Card
     * @return static
     */
    public function footer(Closure|string $content, ?Closure $closure = null)
    {
        if($content instanceof Closure) {
            $closure = $content;
            $content = null;
        }

        $closure($this);

        $_foots = function() {
            $data = [];
            if(! empty($this->buttons))
            {
                $data['buttons'] = $this->buttons;
            }
            return $data;
        };

        $this->properties['footer'] = $_foots();
        $this->properties['footer']['right'] = $this->textRight;
        $this->properties['footer']['content'] = $content;

        return $this;
    }
}