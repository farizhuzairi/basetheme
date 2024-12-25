<?php

namespace Hascha\BaseTheme\Components\Features;

use Closure;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class FlexButton extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained, Featureable;

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return $this->properties;
    }

    // attributes
    protected array $properties = [];

    public function __construct(
        public string $typeOf = 'flex',
        public string $textButton = "Button",
        public string $url = "#",
        public string $withPrevent = "toUrl",
        public string $_dispatchTo = "",
        public array|string $_dispatchValue = "",
        public string $css = "",
        public ?string $icon = null,
    )
    {
        parent::__construct(
            typeOf: $typeOf,
            textButton: $textButton,
            url: $url,
            withPrevent: $withPrevent,
            _dispatchTo: $_dispatchTo,
            _dispatchValue: $_dispatchValue,
            css: $css,
            icon: $icon,
        );
    }

    /**
     * Stylesheet Class
     * @return static
     */
    public function create(string $typeOf, string $text)
    {
        $this->properties['typeOf'] = $typeOf;
        $this->properties['textButton'] = $text;
        return $this;
    }
    
    public function flex(string $text, string $typeOf = 'flex')
    {
        return $this->create($typeOf, $text);
    }
    
    public function toUrl(string $url = '#')
    {
        $this->properties['withPrevent'] = 'toUrl';
        $this->properties['url'] = $url;
        return $this;
    }
    
    public function toDirect(string $_dispatchTo = '', array|string $_dispatchValue = '')
    {
        $this->properties['withPrevent'] = 'direction';
        $this->properties['_dispatchTo'] = $_dispatchTo;
        $this->properties['_dispatchValue'] = $_dispatchValue;
        return $this;
    }
    
    public function withIcon(?string $icon = null)
    {
        $this->properties['icon'] = $icon;
        return $this;
    }

    // Additional Stylesheets
    protected ?string $addStyles = null;
    
    public function css(Closure|string|null $css = null, ?Closure $with)
    {
        if($css instanceof Closure) {
            $with = $css;
            $css = "";
        }

        if($css === null) {
            $css = "";
        }

        if($with instanceof Closure) {
            $with($this);    
            $css = $css . $this->addStyles;
            $this->addStyles = null;
        }

        $this->properties['css'] = $css;
        return $this;
    }
    
    public function withBorder(string $border = '', bool $default = true)
    {
        $this->addStyles = $default ? "px-3 py-2 border border-c-border dark:border-c-border/25" : "";
        $this->addStyles .= !empty($border) ? " {$border}" : "";
        return $this;
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.";
    }
}