<?php

namespace HaschaMedia\BaseTheme\View\BaseComponent;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;

class ExtraContent extends BaseComponent implements Componentable
{
    use Explained;
    
    public function __construct(
        private string $title = "",
        private string $description = "",
    )
    {
        parent::__construct(
            title: $title,
            description: $description,
        );
    }

    public function baseComponent(): string
    {
        return "base::basetheme.components.";
    }
}