<?php

namespace HaschaMedia\BaseTheme\Features\Traits;

use Closure;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableContent;

trait FeatureableLiveContent
{
    use FeatureableContent;
    public array $liveContents = [];
    public array $sideContents = [];
    public array $additionalContents = [];

    /**
     * Live Content Setup
     * @return void
     */
    final protected function liveFeatureContents()
    {
        foreach([
            'liveContents',
            'sideContents',
            'additionalContents',
        ] as $i) {
            if(method_exists($this, $i)) {
                $this->{$i}();
            }
        }
    }
    
    /**
     * Body Content
     * @return static
     */
    public function liveContent(
        string $class,
        Closure|array $attributes = [],
        ?Closure $component = null
    )
    {
        $this->content(
            $class, $attributes, $component, __FUNCTION__
        );
        return $this;
    }
    
    /**
     * Side Content
     * @return static
     */
    public function sideContent(
        string $class,
        Closure|array $attributes = [],
        ?Closure $component = null
    )
    {
        $this->content(
            $class, $attributes, $component, __FUNCTION__
        );
        return $this;
    }
    
    /**
     * Additional Content
     * @return static
     */
    public function additionalContent(
        string $class,
        Closure|array $attributes = [],
        ?Closure $component = null
    )
    {
        $this->content(
            $class, $attributes, $component, __FUNCTION__
        );
        return $this;
    }
}