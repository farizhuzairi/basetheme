<?php

namespace HaschaMedia\BaseTheme\Data\Wireables;

use HaschaMedia\BaseTheme\Livewire\BaseWireable;

class Button extends BaseWireable
{
    public function __construct(
        public ?string $typeOf = null, // base, lite, flex, inline
        public string $withPrevent = "toUrl", // toUrl, direction
        public string $textButton = "Button",
        public ?string $icon = null,
        public string $url = "#", // if toUrl
        public string $_dispatchTo = "", // if direction
        public array|string $_dispatchValue = "", // if direction
        public string $css = "" // Class Css (Add Styles)
    )
    {
        $this->css .= match($typeOf) {
            "base" => " btn-base",
            "lite" => " font-light",
            "flex" => " w-full rounded p-1 mx-4 text-center",
            "inline" => "",
            "clear" => "",
            default => ""
        };
    }
    
    /**
     * Implement to define an object or property
     * @return array
     */
    protected static function properties()
    {
        return [
            'typeOf',
            'withPrevent',
            'textButton',
            'icon',
            'url',
            '_dispatchTo',
            '_dispatchValue',
            'css',
        ];
    }

    /**
     * @return string
     */
    protected static function class()
    {
        return static::class;
    }
}