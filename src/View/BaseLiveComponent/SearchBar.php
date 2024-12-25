<?php

namespace HaschaMedia\BaseTheme\View\BaseLiveComponent;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Builder\Component\BaseLiveComponent;

class SearchBar extends BaseLiveComponent implements Componentable
{
    use Explained;

    public function baseComponent(): string
    {
        return "base::livewire.";
    }
}