<?php

namespace Hascha\BaseTheme\Components\Elements;

use Hascha\BaseTheme\Contracts\Htmlable;
use Hascha\BaseTheme\Builder\Element\BaseElement;
use Hascha\BaseTheme\Contracts\Element\Elementable;

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