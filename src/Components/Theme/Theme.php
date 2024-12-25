<?php

namespace Hascha\BaseTheme\Components\Theme;

use Hascha\BaseTheme\Contracts\Htmlable;
use Hascha\BaseTheme\Builder\Theme\BaseTheme;
use Hascha\BaseTheme\Contracts\Theme\Themeable;

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