<?php

namespace HaschaMedia\BaseTheme\Components\Theme;

use HaschaMedia\BaseTheme\Contracts\Htmlable;
use HaschaMedia\BaseTheme\Builder\Theme\BaseTheme;
use HaschaMedia\BaseTheme\Contracts\Theme\Themeable;

class Theme extends BaseTheme implements Htmlable, Themeable
{
    public function __construct(
        ...$data
    )
    {
        parent::__construct(
            ...$data
        );
    }
}