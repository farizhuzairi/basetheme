<?php

namespace Hascha\BaseTheme\View\BaseComponent;

use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;

class NavMenu extends BaseComponent implements Componentable
{
    public function __construct(
        private string $text = "",
        private ?string $details = null,
        private string $url = "",
        private ?string $icon = null,
        private array $dropdown = [],
        protected ?string $typeOf = null,
        public string $style = "",
        public string $subStyle = "",
        private array $dataHero = [],
    )
    {
        parent::__construct(
            text: $text,
            details: $details,
            url: $url,
            icon: $icon,
            dropdown: $dropdown,
            dataHero: $dataHero
        );
    }

    public function baseComponent(): string
    {
        return "base::components.menu.";
    }

    protected function construction(ThemeService $service)
    {
        $this->__setBase($this->typeOf, function($blade) {
            return empty($blade) ? "list" : $blade;
        });
    }
}