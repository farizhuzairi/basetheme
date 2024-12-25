<?php

namespace HaschaMedia\BaseTheme\View\BaseComponent;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Contracts\Component\Slotable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;

class BaseCatalog extends BaseComponent implements Componentable, Slotable
{
    use Explained;

    public function baseComponent(): string
    {
        return "base::basetheme.components.";
    }
    
    public function altContent(mixed $data)
    {
        return [
            '__contents' => $data
        ];
    }
}