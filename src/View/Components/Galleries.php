<?php

namespace HaschaMedia\BaseTheme\View\Components;

use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;

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