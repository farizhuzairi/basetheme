<?php

namespace HaschaMedia\BaseTheme\Contracts\Factory;

use Closure;
use HaschaMedia\BaseTheme\Contracts\Factory\Html;

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