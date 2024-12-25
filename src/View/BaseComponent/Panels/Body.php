<?php

namespace HaschaMedia\BaseTheme\View\BaseComponent\Panels;

use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;

class Body extends BaseComponent implements Componentable
{
    public function baseComponent(): string
    {
        return "base::basetheme.components.panels.";
    }
}