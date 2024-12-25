<?php

namespace Hascha\BaseTheme\View\BaseComponent;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;

class Navigation extends BaseComponent implements Componentable
{
    public function baseComponent(): string
    {
        return "base::basetheme.components.";
    }
}