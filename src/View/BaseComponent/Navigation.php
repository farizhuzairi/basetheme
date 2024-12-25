<?php

namespace HaschaMedia\BaseTheme\View\BaseComponent;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;

class Navigation extends BaseComponent implements Componentable
{
    public function baseComponent(): string
    {
        return "base::basetheme.components.";
    }
}