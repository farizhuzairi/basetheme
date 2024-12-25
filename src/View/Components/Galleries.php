<?php

namespace Hascha\BaseTheme\View\Components;

use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;

class Galleries extends BaseComponent implements Componentable
{
    public function __construct(public string $name, public array $data = [])
    {
        parent::__construct(name: $name, data: $data);
    }

    public function baseComponent(): string
    {
        return "base::components.";
    }
}