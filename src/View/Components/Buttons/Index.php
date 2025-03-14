<?php

namespace Hascha\BaseTheme\View\Components\Buttons;

use Illuminate\View\View;
use Illuminate\View\Component;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;

class Index extends BaseComponent implements Componentable
{
    /**
     * @var string
     */
    public $activeCss;

    public function __construct(
        private string $text = "",
        private string $icon = "",
        private string $btnType = "button", // button, submit
        private string $url = "#",
        protected string $typeOf = "icon", // icon, link, case
        protected bool $isActive = false,
    )
    {
        $this->activeCss = $isActive ? " font-medium" : "";
        parent::__construct(
            text: $text,
            icon: $icon,
            btnType: $btnType,
            url: $url,
        );
    }

    public function baseComponent(): string
    {
        return "base::components.buttons.btn-";
    }

    protected function construction(ThemeService $service)
    {
        $this->__setBase($this->typeOf, function($blade) {
            return empty($blade) ? "link" : $blade;
        });
    }
}