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
        $this->brands = [
            'name' => (empty($name) ? config('app.name') : $name),
            'logo' => (empty($logo) ? asset('icons/android-chrome-512x512.png') : $logo),
            'icon' => (empty($logo) ? asset('icons/android-chrome-512x512.png') : $logo),
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
        $icon = asset("icons/apple-touch-icon.png");
        $icon1 = asset("icons/favicon-32x32.png");
        $icon2 = asset("icons/favicon-16x16.png");
        $webmanifestJson = asset("icons/site.webmanifest");

        return '<link rel="apple-touch-icon" sizes="180x180" href="' . $icon .'"><link rel="icon" type="image/png" sizes="32x32" href="' . $icon1 .'"><link rel="icon" type="image/png" sizes="16x16" href="' . $icon2 .'"><link rel="manifest" href="' . $webmanifestJson .'">';
    }
    
    public function defaultCss(): string
    {
        return '<link href="' . asset('basetheme/css/styles.css') . '" rel="stylesheet" type="text/css"><link href="' . asset('basetheme/css/main.css') . '" rel="stylesheet" type="text/css">';
    }

    public function defaultJs(): string
    {
        return '<script src="' . asset('basetheme/js/main.js') . '"></script>';
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