<?php

namespace HaschaMedia\BaseTheme\Components\Elements;

use HaschaMedia\BaseTheme\Contracts\Htmlable;
use HaschaMedia\BaseTheme\Builder\Element\BaseElement;
use HaschaMedia\BaseTheme\Contracts\Element\Elementable;

class Header extends BaseElement implements Htmlable, Elementable
{
    public function __construct(string $theme)
    {
        $this->initializeViewComponent($this->__getClassName(), $theme);
        parent::__construct(theme: $theme);
    }

    protected function features(): array
    {
        return [];
    }
}