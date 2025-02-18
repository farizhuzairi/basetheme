<?php

namespace Hascha\BaseTheme\Features\Traits;

use Closure;
use Illuminate\Support\Collection;
use Hascha\BaseTheme\Factory\ComponentFactory;
use Hascha\BaseTheme\Contracts\Component\Componentable;

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

    // with Tab
    protected bool $isTabContent = false;

    // Tab Key Data
    protected array $tabs = [];
    
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

        if($this->isTabContent) {
            $this->{$_var(__FUNCTION__, $var)}[array_key_last($this->tabs)] = $_feature;
        }
        else {
            $this->{$_var(__FUNCTION__, $var)}[] = $_feature;
        }

        return $this;
    }

    /**
     * With Tab Contents
     * @return static
     */
    public function tabContent(string $key, string $tabName, string $class, Closure|array $attributes = [], ?Closure $component = null, ?string $var = null)
    {
        if(!empty($key) && !empty($tabName)) {
            $this->isTabContent = true;
            $this->tabs[$key] = [
                'key' => $key,
                'name' => $tabName,
            ];
        }

        $this->content($class, $attributes, $component, $var);
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function featureableContents(Collection $data)
    {
        // if($this->isTabContent) dd($this->contents);
        // if($this->isTabContent) dd(array_key_last($this->tabs));
        $data = $data->put('isTabContent', $this->isTabContent);
        $data = $data->put('tabs', $this->tabs);
        $data = $data->put('contents', $this->contents);
        return $data;
    }
}