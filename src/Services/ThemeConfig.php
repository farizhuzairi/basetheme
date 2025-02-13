<?php

namespace Hascha\BaseTheme\Services;

use Illuminate\Support\Str;
use Hascha\BaseTheme\Services\Configuration;

class ThemeConfig
{
    /**
     * customize layout and theme appearance
     * 
     * @var array
     */
    protected $appearances;

    /**
     * set brands
     * brand name and icon (logo) or image brand
     * 
     * @var array
     */
    public $brands;

    /**
     * Configuration package
     * 
     * @var \Hascha\BaseTheme\Services\Configuration
     */
    private static $config;

    public function __construct(
        Configuration $config
    )
    {
        static::$config = $config;
        $this->setBrands();
        $this->setAppearance();
    }

    private function setAppearance(): void
    {
        $this->appearances = [
            'base' => '',
            'soft' => 'soft',
            'basethick' => 'basethick',
        ];
    }

    public function theme(?string $theme = "basethick"): string
    {
        if(empty($theme)) {
            return "";
        }

        return $this->appearances[$theme];
    }

    public function setBrands(?string $name = null, ?string $logo = null, ?string $icon = null): static
    {
        $attrs = static::$config->getConfig('attributes');
        $this->brands = [
            'name' => (empty($name) ? config('app.name') : $name),
            'logo' => (empty($logo) ? $attrs['logo'] : $logo),
            'icon' => (empty($logo) ? $attrs['icon'] : $logo),
        ];
        return $this;
    }

    public function brandName(): string
    {
        return $this->brands['name'];
    }

    public function brandLogo(): string
    {
        return $this->brands['logo'];
    }

    public function brandIcon(): string
    {
        return $this->brands['icon'];
    }

    public function defaultManifest(): string
    {
        $manifest = static::$config->getConfig('manifest');
        $_fav = '';

        foreach($manifest as $i) {
            $_fav .= $i;
        }

        return $_fav;
    }

    protected function fromCDN(): string
    {
        $tailwind = static::$config->getConfig('tailwind');

        if(is_array($tailwind)) {
            $withCDN = $tailwind['cdn'];
            return $withCDN ? $tailwind['url'] : '';
        }

        return '';
    }
    
    public function defaultCss(): string
    {
        $stylesheets = static::$config->getConfig('stylesheets');
        $_css = $this->fromCDN();

        foreach($stylesheets as $i) {
            $_css .= $i;
        }

        return $_css;

    }

    public function defaultJs(): string
    {
        $javascripts = static::$config->getConfig('javascripts');
        $_js = '';
        
        foreach($javascripts as $i) {
            $_js .= $i;
        }

        return $_js;
    }

    public function __call(string $method, mixed $arguments)
    {
        $args = null;
        if(isset($arguments[0])) $args = !empty($arguments[0]) ? explode('.', $arguments[0]) : null;
        return static::$config->getConfig(Str::snake($method), $args);
    }

    /**
     * Layout container variable
     * @return string
     */
    public function layoutVariable()
    {
        return "slot";
    }
}