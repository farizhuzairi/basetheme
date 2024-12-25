<?php

namespace Hascha\BaseTheme\Components\Layout;

use Hascha\BaseTheme\Contracts\Htmlable;
use Hascha\BaseTheme\Builder\Layout\BaseLayout;
use Hascha\BaseTheme\Contracts\Layout\Layoutable;

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