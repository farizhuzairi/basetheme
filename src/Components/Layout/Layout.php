<?php

namespace HaschaMedia\BaseTheme\Components\Layout;

use HaschaMedia\BaseTheme\Contracts\Htmlable;
use HaschaMedia\BaseTheme\Builder\Layout\BaseLayout;
use HaschaMedia\BaseTheme\Contracts\Layout\Layoutable;

class Layout extends BaseLayout implements Htmlable, Layoutable
{
    public function __construct(string $layout, ?string $title = null, array $data = [])
    {
        parent::__construct(...array_merge($data, [
            'layout' => $layout,
            'title' => $title
        ]));
    }
}