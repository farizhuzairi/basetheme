<?php

namespace Hascha\BaseTheme\View\BaseLiveComponent;

use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Builder\Component\BaseLiveComponent;

class Image extends BaseLiveComponent implements Componentable
{
    public ?string $css = null;
    public ?string $typeOf = null;
    public ?string $src;
    public ?string $alt;

    /**
     * Start the function that must be preceded
     * @return void
     */
    protected function run()
    {
        $this->__setBase($this->typeOf, function($blade) {
            return empty($blade) ? "index" : $blade;
        });
    }

    public function baseComponent(): string
    {
        return "base::livewire.image.";
    }
}