<?php

namespace Hascha\BaseTheme\Contracts\Factory;

use Closure;
use Hascha\BaseTheme\Contracts\Factory\Html;

interface HtmlFactory
{
    public function __construct(Html $html);

    // Menambahkan Html Element Instance berdasarkan antarmuka Elementable
    public function add(
        string $class,
        array $attributes,
        Closure $component,
        ?Closure $authorization = null
    ): Html;
}