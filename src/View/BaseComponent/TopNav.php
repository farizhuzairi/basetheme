<?php

namespace Hascha\BaseTheme\View\BaseComponent;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Contracts\Component\Slotable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;

class TopNav extends BaseComponent implements Componentable, Slotable
{
    use Explained;

    public function baseComponent(): string
    {
        return "base::basetheme.components.";
    }

    public function defaultables()
    {
        return [
            'tagables' => [],
            'topButtons' => []
        ];
    }

    public function altContent(mixed $data)
    {
        return [
            '__contents' => $data
        ];
    }
}