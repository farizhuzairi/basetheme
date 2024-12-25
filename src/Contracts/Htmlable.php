<?php

namespace HaschaMedia\BaseTheme\Contracts;

use HaschaMedia\BaseTheme\Contracts\Layouting;

interface Htmlable
{
    /**
     * @param \HaschaMedia\BaseTheme\Contracts\Layouting $builder
     * @return void
     */
    public function accept(Layouting $builder);
}