<?php

namespace HaschaMedia\BaseTheme\Factory\Element;

use Closure;
use HaschaMedia\BaseTheme\Factory\BaseHtml;
use HaschaMedia\BaseTheme\Contracts\Layouting;
use HaschaMedia\BaseTheme\Contracts\Factory\Html;
use HaschaMedia\BaseTheme\Contracts\Element\Elementable;

class HtmlElement extends BaseHtml implements Html
{
    /**
     * @var array
     */
    private $elements = [];

    /**
     * Construction
     * @param \HaschaMedia\BaseTheme\Contracts\Layouting $layoutBuilder
     */
    public function __construct(protected Layouting $layoutBuilder)
    {}

    /**
     * @param \HaschaMedia\BaseTheme\Contracts\Element\Elementable $html
     * @return static
     */
    public function set($html): static
    {
        if($html instanceof Elementable) {
            $this->elements[$html->__getClassName()] = $html;
        }

        return $this;
    }

    /**
     * Builder implementation
     * @return void
     */
    protected function toBuilder(Layouting $builder): void
    {
        foreach($this->elements as $element) {
            $element->accept($builder);
        }
    }
}