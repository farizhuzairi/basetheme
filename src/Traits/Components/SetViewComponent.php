<?php

namespace HaschaMedia\BaseTheme\Traits\Components;

trait SetViewComponent
{
    protected const PREFIX_METHOD = "typeOf";
    protected ?string $typeOf = null;

    /**
     * set view component default
     * Override untuk mengatur komponen default.
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "empty";
    }

    /**
     * set type of
     * @return void
     */
    protected function typeOf(?string $component)
    {
        $this->__setBase($component, function($blade) {
            return empty($blade) ? $this->setViewComponentDefault() : $blade;
        });

        return $this;
    }

    /**
     * set as view component
     * @param string $method
     * @return void
     */
    protected function setAsViewComponent(string $method)
    {
        $result = function($name) {
            $r = str_replace(static::PREFIX_METHOD, '', $name);
            $r = lcfirst($r);
            return !empty($r) ? \Illuminate\Support\Str::snake($r, '-') : null;
        };

        $this->typeOf = $result($method);
        $this->typeOf($this->typeOf);
    }
}