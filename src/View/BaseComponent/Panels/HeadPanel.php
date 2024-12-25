<?php

namespace Hascha\BaseTheme\View\BaseComponent\Panels;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;

class HeadPanel extends BaseComponent implements Componentable
{
    use Explained;

    public function baseComponent(): string
    {
        return "base::basetheme.components.panels.";
    }

    public function defaultables()
    {
        return [
            'subject' => null,
            'slogan' => null,
        ];
    }
}