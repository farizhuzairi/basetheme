<?php

namespace HaschaMedia\BaseTheme\Livewire;

use Livewire\Wireable;
use Illuminate\Contracts\Support\Arrayable;

abstract class BaseWireable implements Wireable, Arrayable
{
    /**
     * Implement to define an object or property
     * @return array
     */
    abstract protected static function properties();

    /**
     * @return string
     */
    abstract protected static function class();

    public function toLivewire()
    {
        $properties = [];
        foreach(static::properties() as $_obj) {
            if(property_exists($this, $_obj)) {
                $properties[$_obj] = $this->{$_obj};
            }
        }

        return $properties;
    }

    public static function fromLivewire($value)
    {
        $properties = [];
        foreach(static::properties() as $_obj) {
            if(isset($value[$_obj])) {
                $properties[$_obj] = $value[$_obj];
            }
        }

        $instance = static::class();
        return new $instance(...$properties);
    }

    /**
     * Arrayable implements.
     * 'Override' to configure array data return
     * @return array
     */
    public function toArray()
    {
        $arr = [];
        foreach(static::properties() as $i) {
            $arr[$i] = $this->{$i};
        }
        
        return $arr;
    }
}