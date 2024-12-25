<?php

namespace Hascha\BaseTheme\Contracts;

use Hascha\BaseTheme\Contracts\Layouting;

interface Htmlable
{
    /**
     * @param \Hascha\BaseTheme\Contracts\Layouting $builder
     * @return void
     */
    public function accept(Layouting $builder);
}