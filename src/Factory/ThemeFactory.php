<?php

namespace HaschaMedia\BaseTheme\Factory;

use HaschaMedia\BaseTheme\Services\ThemeService;
use HaschaMedia\BaseTheme\Traits\Factory\UseTheme;
use HaschaMedia\BaseTheme\Traits\Factory\UseLayout;
use HaschaMedia\BaseTheme\Contracts\Theme\Themeable;
use HaschaMedia\BaseTheme\Contracts\Layout\Layoutable;
use HaschaMedia\BaseTheme\Contracts\Element\Elementable;
use HaschaMedia\BaseTheme\Exceptions\BaseThemeException;

final class ThemeFactory
{
    use UseLayout, UseTheme;
    
    /**
     * @var static
     */
    private static $factory;

    /**
     * @var \HaschaMedia\BaseTheme\Services\ThemeService
     */
    private static $service;

    /**
     * @var \Illuminate\Support\Collection
     */
    private static $attributes;

    /**
     * private construction
     */
    private function __construct(ThemeService $service)
    {
        static::$service = $service;
        static::$attributes = collect([]);
    }

    /**
     * Use factory
     * 
     * @return \HaschaMedia\BaseTheme\Builder\Factory\ThemeFactory
     */
    public static function make()
    {
        if(empty(static::$factory)) {
            static::$factory = new self(baseTheme());
        }

        return static::$factory;
    }

    /**
     * @return ThemeService
     */
    public function service()
    {
        return static::$service;
    }

    /**
     * @return void
     */
    public function layout()
    {
        $class = $this->useLayout($this->__layout);
        $instance = new $class($this->__layout, $this->__title);

        if(! $instance instanceof Layoutable) {
            throw new BaseThemeException(...defineError("Layout is unusable or missing.", __CLASS__, __LINE__, 10002));
        }

        $instance->accept(static::$service->layoutBuilder());
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    private function __layoutRendered()
    {
        return static::$service->layoutBuilder()->getView(static::LAYOUT);
    }

    /**
     * @return void
     */
    public function theme()
    {
        $class = $this->useTheme('class', $this->__theme);
        $instance = new $class(
            $this->useTheme('theme', $this->__theme),
            $this->__alias,
            $this->__title
        );

        if(! $instance instanceof Themeable) {
            throw new BaseThemeException(...defineError("Theme is unusable or missing.", __CLASS__, __LINE__, 10002));
        }

        $instance->accept(static::$service->layoutBuilder());
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    private function __themeRendered()
    {
        $__th = static::$service->layoutBuilder()->getView(static::THEME);
        $__th->with('__content', static::$service->layoutBuilder()->elements());

        return $__th;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return $this->__layoutRendered()
        ->with(themeConfig()->layoutVariable(), $this->__themeRendered());
    }

    /**
     * @return void
     */
    public function element(string $element, array $attributes = [])
    {
        static::$service->element($element, $attributes);
    }

    /**
     * @return void
     */
    public function withAttribute(string $key, mixed $data = null)
    {
        if(! empty($key)) {
            static::$attributes = static::$attributes->put("__{$key}", $data);
            $this->service()->withAttribute($key, $data);
        }
    }

    /**
     * @return mixed
     */
    private function getAttribute(string $key)
    {
        if(static::$attributes->has($key)) {
            return static::$attributes->get($key);
        }
        return null;
    }

    private function __clone()
    {}

    final public function __wakeup()
    {
        throw new BaseThemeException(...defineError("Cannot unserialize theme model factory.", __CLASS__, __LINE__, 10002));
    }

    public function __set($prop, $value)
    {
        throw new BaseThemeException(...defineError("Property or Attribute is not accessible.", __CLASS__, __LINE__, 10002));
    }

    /**
     * @return mixed
     */
    public function __get(string $prop)
    {
        if(! empty(static::$factory)) {
            return $this->getAttribute($prop);
        }

        return null;
    }
}