<?php

namespace HaschaMedia\BaseTheme\Factory;

use HaschaMedia\BaseTheme\Contracts\Layouting;

abstract class BaseHtml
{
    // Layout Builder
    public function build()
    {
        return $this->toBuilder($this->layoutBuilder);
    }

    /**
     * Builder implementation
     * @return static|\HaschaMedia\BaseTheme\Contracts\Component\Componentable
     */
    abstract protected function toBuilder(Layouting $builder);
}