<?php

namespace Hascha\BaseTheme\Livewire;

use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

abstract class BaseSynth extends Synth
{
    /**
     * Implement to define an object or property
     * @return array
     */
    abstract protected static function properties();

    /**
     * @return bool
     */
    abstract protected static function hasMatch($target);

    /**
     * @return object
     */
    abstract protected function instance();

    public static function match($target)
    {
        return static::hasMatch($target);
    }

    public function dehydrate($target)
    {
        $properties = [];
        foreach(static::properties() as $_obj) {
            if(property_exists($this->instance(), $_obj)) {
                $properties[$_obj] = $target->{$_obj};
            }
        }

        return [$properties, []];
    }

    public function hydrate($value)
    {
        $instance = $this->instance();
        
        foreach(static::properties() as $_prop) {
            if(method_exists($instance, $_prop)) {
                $instance->{$_prop} = $instance->{$_prop}($value[$_prop]);
            }
            elseif(isset($value[$_prop])) {
                $instance->{$_prop} = $value[$_prop];
            }
        }

        return $instance;
    }

    public function get(&$target, $key) 
    {
        return $target->{$key};
    }

    public function set(&$target, $key, $value)
    {
        $target->{$key} = $value;
    }
}