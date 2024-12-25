<?php

namespace HaschaMedia\BaseTheme;

use Closure;
use Illuminate\Contracts\View\View;
use HaschaMedia\BaseTheme\Traits\ThemeModelable;
use HaschaMedia\BaseTheme\Exceptions\BaseThemeException;

abstract class ThemeModel
{
    use ThemeModelable;
    
    /**
     * define classes for theme models
     * 
     * @var string
     */
    protected string $theme = "";

    /**
     * gives an alias name for the rendered page
     * 
     * @var string
     */
    protected string $alias = "";

    /**
     * Specify the page title. Use the default value (null) for dynamic title usage, if the page has primary content.
     * 
     * @var string
     */
    protected string $title = "";

    /**
     * entry point,
     * starting theme model initialization
     * 
     */
    final public static function make(): static
    {
        return (new static())->modelable();
    }

    /**
     * render as view
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function view()
    {
        if(! static::$view instanceof View) {
            throw new BaseThemeException(...defineError("Cannot instance theme model.", __CLASS__, __LINE__, 10004));
        }

        return static::$view;
    }

    /**
     * render as string
     * 
     * @return string
     */
    public function toHtml()
    {
        return static::$view()->toHtml();
    }

    /**
     * Use the boot() method to call various default features, customize the page, and add additional functionality that should run every time the page is rendered.
     * 
     * @return void
     */
    protected function boot()
    {
        $this->__has_default_callback();
    }

    /**
     * Clone tidak diizinkan
     * 
     */
    private function __clone()
    {}

    /**
     * Hanya dapat digunakan satu kali untuk setiap tema yang disertakan dalam tampilan.
     * 
     */
    final public function __wakeup()
    {
        throw new BaseThemeException(...defineError("Cannot unserialize theme model class.", __CLASS__, __LINE__, 10004));
    }
}