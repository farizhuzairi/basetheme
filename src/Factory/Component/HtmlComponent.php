<?php

namespace HaschaMedia\BaseTheme\Factory\Component;

use Closure;
use HaschaMedia\BaseTheme\Factory\BaseHtml;
use HaschaMedia\BaseTheme\Contracts\Layouting;
use HaschaMedia\BaseTheme\Contracts\Factory\Html;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;

class HtmlComponent extends BaseHtml implements Html
{
    /**
     * @var \HaschaMedia\BaseTheme\Contracts\Component\Componentable
     */
    private $component;

    /**
     * Construction
     * @param \HaschaMedia\BaseTheme\Contracts\Layouting $layoutBuilder
     */
    public function __construct(protected Layouting $layoutBuilder)
    {}

    /**
     * @param \HaschaMedia\BaseTheme\Contracts\Component\Componentable $html
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
     * @return \HaschaMedia\BaseTheme\Contracts\Component\Componentable
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