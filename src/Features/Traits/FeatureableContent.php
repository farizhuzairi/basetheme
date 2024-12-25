<?php

namespace HaschaMedia\BaseTheme\Features\Traits;

use Closure;
use Illuminate\Support\Collection;
use HaschaMedia\BaseTheme\Factory\ComponentFactory;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;

trait FeatureableContent
{
    public function makeFeature(array|string $class, Closure|array $attributes = [], ?Closure $component = null, ?ComponentFactory $factory = null): ?Componentable
    {
        if($attributes instanceof Closure) {
            $component = $attributes;
            $attributes = [];
        }

        if($factory === null) {
            $factory = app('componentFactory');
        }

        return $factory->add($class, $attributes, $component)->build();
    }

    // content attributes
    protected array $contents = [];
    
    /**
     * Card Body Content
     * @return static
     */
    public function content(string $class, Closure|array $attributes = [], ?Closure $component = null, ?string $var = null)
    {
        if(class_exists($class)) {
            $_feature = $this->makeFeature($class, $attributes, $component);
        }

        if(! empty($class) && empty($attributes) && empty($component)) {
            $_feature = is_string($class) ? $class : null;
        }

        if($_feature instanceof Componentable) {
            $_feature = $_feature->resolveView();
        }

        $_var = function(string $fc, ?string $var) {
            if($var) {
                return $var . 's';
            }
            return $fc . 's';
        };

        $this->{$_var(__FUNCTION__, $var)}[] = $_feature;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function featureableContents(Collection $data)
    {
        return $data->put('contents', $this->contents);
    }
}