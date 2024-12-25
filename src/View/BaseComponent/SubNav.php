<?php

namespace Hascha\BaseTheme\View\BaseComponent;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Contracts\Component\Slotable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;

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