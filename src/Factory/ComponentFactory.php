<?php

namespace Hascha\BaseTheme\Factory;

use Closure;
use Hascha\BaseTheme\Contracts\Factory\Html;
use Hascha\BaseTheme\Contracts\Factory\HtmlFactory;

final class ComponentFactory implements HtmlFactory
{
    public function __construct(private Html $html)
    {}

    public function add(
        string $class,
        array $attributes,
        Closure $component,
        ?Closure $authorization = null
    ): Html
    {
        $component = $component(new $class(...$attributes));
        return $this->html->set($component);
    }
}