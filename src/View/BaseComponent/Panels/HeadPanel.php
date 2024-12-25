<?php

namespace HaschaMedia\BaseTheme\View\BaseComponent\Panels;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;

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