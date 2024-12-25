<?php

namespace Hascha\BaseTheme\Services;

use Closure;
use Hascha\BaseTheme\Traits\AltKey;
use Hascha\BaseTheme\Contracts\Builder;
use Hascha\BaseTheme\Exceptions\BaseThemeException;
use Hascha\BaseTheme\Traits\Has\HasGlobalDataComposer;

class ThemeService
{
    use HasGlobalDataComposer;
    
    /**
     * Layout Builder Schemes
     * 
     * @var array
     */
    public $builderSchemes = [];

    /**
     * Layout Builder Instance
     * 
     * @var array
     */
    private $builder = [];

    /**
     * Base Theme Attribute
     * @var \Illuminate\Support\Collection
     */
    private $attributes;

    /**
     * Base Theme Html
     * @var string|null
     */
    private string|null $_btheme = "basethick";

    /**
     * @var \Illuminate\Support\Collection
     */
    private static $data;

    /**
     * @var \Illuminate\Support\Collection
     */
    private static $slotable;

    // DATA PRIVATE KEY
    public const PRIVATE_KEY = "private";

    // Kunci Variabel Alternatif
    use AltKey;

    /**
     * Construction
     */
    public function __construct(...$builder)
    {
        foreach($builder as $_key => $i) {
            $this->setBuilder($_key, $i);
        }

        static::$data = collect([
            static::PRIVATE_KEY => []
        ]);

        static::$slotable = collect([]);
        $this->attributes = collect([]);
    }

    /**
     * set btheme
     * @return void
     */
    public function theme(?string $theme): void
    {
        $this->_btheme = $theme;
    }

    /**
     * get btheme
     * @return string
     */
    public function btheme(string $prefix): string
    {
        if(empty($this->_btheme)) {
            return $prefix;
        }

        return "{$prefix}-{$this->_btheme}";
    }

    /**
     * @return static
     */
    public function setBuilder(string $key, string $builder)
    {
        if(! class_exists($builder)) {
            throw new BaseThemeException(...defineError("{$builder} class is not exists.", __CLASS__, __LINE__, 10003));
        }

        $newBuilder = function(Builder $i) {
            return new $i;
        };

        $this->builderSchemes[] = $key;
        $this->builder[$key] = $newBuilder(new $builder);

        return $this;
    }

    /**
     * @return void
     */
    public function withAttribute(string $key, mixed $data = null)
    {
        if(! empty($key)) {
            $this->attributes = $this->attributes->put($key, $data);
        }
    }

    /**
     * @return mixed
     */
    public function getAttribute(string $key)
    {
        if($this->attributes->has($key)) {
            return $this->attributes->get($key);
        }
        return null;
    }

    /**
     * add Element
     * @return static
     */
    public function element(string $element, array $attributes = [], ?Closure $component = null)
    {
        if(empty($component)) {
            $component = function($component) {
                return $component;
            };
        }

        app('elementFactory')
        ->add(
            $element,
            $attributes,
            $component
        )
        ->build();

        return $this;
    }

    /**
     * Add Data
     * @return void
     */
    public function addPrivateData(string $key, mixed $data)
    {
        static::$data = static::$data->map(function(mixed $_i, string $_k) use ($key, $data) {
            $result = $_i;
            if($_k === static::PRIVATE_KEY) {
                $result[$key] = $data;
            }
            return $result;
        });
    }

    /**
     * Get Data Private
     * @return array
     */
    public function privateData(string $componentName)
    {
        // ubah get() menjadi pull()
        $private = collect(static::$data->get(static::PRIVATE_KEY));
        $_get = $private->get($componentName);
        static::$data = static::$data->put(static::PRIVATE_KEY, $private->toArray());

        return is_array($_get) ? $_get : [];
    }

    /**
     * Add Data Alternative (Slotable)
     * @return void
     */
    public function addToSlot(string $key, mixed $data)
    {
        static::$slotable = static::$slotable->put($this->alt_key($key), $data);
    }

    /**
     * Get Data Alternative (Slotable)
     * @return array
     */
    public function slotable(string $key)
    {
        $result = static::$slotable->pull($key);
        return is_array($result) ? $result : [];
    }

    /**
     * Add Data
     * @return void
     */
    public function withData(array|string $key, mixed $data = null)
    {
        if(is_string($key)) {
            static::$data = static::$data->merge([$key => $data]);
        }
        
        if(is_array($key)) {
            static::$data = static::$data->merge($key);
        }
    }

    /**
     * Cek Data Global
     * @return bool
     */
    public function hasData(string $key, bool $isGlobal = false)
    {
        if($isGlobal) $key = $this->global_key($key);
        return static::$data->has($key);
    }

    /**
     * Get Data Global
     * @return Collection
     */
    public function globalComposer()
    {
        return static::$data->except([static::PRIVATE_KEY]);
    }

    public function __call(string $name, mixed $args)
    {
        if(in_array($name, $this->builderSchemes)) {
            return $this->builder[$name];
        }

        return null;
    }

    /**
     * Set Page Title
     * @return void
     */
    public function setPageTitle(string $title)
    {
        $this->withAttribute('title', $title);
    }

    /**
     * Get Page Title
     * @return string|null
     */
    public function pageTitle()
    {
        return $this->getAttribute('title');
    }
}