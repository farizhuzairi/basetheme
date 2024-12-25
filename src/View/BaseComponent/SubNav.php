<?php

namespace HaschaMedia\BaseTheme\View\BaseComponent;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Contracts\Component\Slotable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;

class SubNav extends BaseComponent implements Componentable
{
    use Explained;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function baseComponent(): string
    {
        return "base::basetheme.components.";
    }
}