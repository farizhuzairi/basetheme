<?php

namespace Hascha\BaseTheme\View\BaseComponent\Panels;

use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;

class Body extends BaseComponent implements Componentable
{
    public function baseComponent(): string
    {
        return "base::basetheme.components.panels.";
    }
}