<?php

namespace Hascha\BaseTheme\Factory;

use Hascha\BaseTheme\Contracts\Layouting;

abstract class BaseHtml
{
    // Layout Builder
    public function build()
    {
        return $this->toBuilder($this->layoutBuilder);
    }

    /**
     * Builder implementation
     * @return static|\Hascha\BaseTheme\Contracts\Component\Componentable
     */
    abstract protected function toBuilder(Layouting $builder);
}