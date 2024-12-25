<?php

namespace Hascha\BaseTheme\Factory\Component;

use Closure;
use Hascha\BaseTheme\Factory\BaseHtml;
use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Contracts\Factory\Html;
use Hascha\BaseTheme\Contracts\Component\Componentable;

class HtmlComponent extends BaseHtml implements Html
{
    /**
     * @var \Hascha\BaseTheme\Contracts\Component\Componentable
     */
    private $component;

    /**
     * Construction
     * @param \Hascha\BaseTheme\Contracts\Layouting $layoutBuilder
     */
    public function __construct(protected Layouting $layoutBuilder)
    {}

    /**
     * @param \Hascha\BaseTheme\Contracts\Component\Componentable $html
     * @return static
     */
    public function set($html): static
    {
        if($html instanceof Componentable) {
            $this->component = $html;
        }
        return $this;
    }

    /**
     * Builder implementation
     * @return \Hascha\BaseTheme\Contracts\Component\Componentable
     */
    protected function toBuilder(Layouting $builder): Componentable
    {
        try {
            return $this->component->accept($builder);
        } finally {
            $this->component = null;
        }
    }
}