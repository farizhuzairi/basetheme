<?php

namespace Hascha\BaseTheme\View\BaseComponent;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;

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