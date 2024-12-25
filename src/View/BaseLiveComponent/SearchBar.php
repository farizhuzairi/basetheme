<?php

namespace Hascha\BaseTheme\View\BaseLiveComponent;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Builder\Component\BaseLiveComponent;

class SearchBar extends BaseLiveComponent implements Componentable
{
    use Explained;

    public function baseComponent(): string
    {
        return "base::livewire.";
    }
}