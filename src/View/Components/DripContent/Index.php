<?php

namespace Hascha\BaseTheme\View\Components\DripContent;

use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;

class Index extends BaseComponent implements Componentable
{
    public function __construct(
        protected string $section = "base", // base
        protected string $title = "",
        protected string $introduction = "",
        protected string $label = "",
        protected string $main = "",
        protected ?string $aside = null,
        protected string $typeOf = "index", // index
    )
    {
        parent::__construct(
            section: $section,
            title: $title,
            introduction: $introduction,
            label: $label,
            main: $main,
            aside: $aside,
        );
    }

    public function baseComponent(): string
    {
        return "base::basetheme.components.drip-content.";
    }

    protected function construction(ThemeService $service)
    {
        $this->__setBase($this->typeOf, function($blade) {
            return empty($blade) ? "index" : $blade;
        });
    }
}