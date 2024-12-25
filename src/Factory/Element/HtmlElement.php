<?php

namespace Hascha\BaseTheme\Factory\Element;

use Closure;
use Hascha\BaseTheme\Factory\BaseHtml;
use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Contracts\Factory\Html;
use Hascha\BaseTheme\Contracts\Element\Elementable;

class HtmlElement extends BaseHtml implements Html
{
    /**
     * @var array
     */
    private $elements = [];

    /**
     * Construction
     * @param \Hascha\BaseTheme\Contracts\Layouting $layoutBuilder
     */
    public function __construct(protected Layouting $layoutBuilder)
    {}

    /**
     * @param \Hascha\BaseTheme\Contracts\Element\Elementable $html
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