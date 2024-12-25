<?php

namespace HaschaMedia\BaseTheme\View\BaseLiveComponent;

use Closure;
use Illuminate\Http\Request;
use HaschaMedia\BaseTheme\Services\ThemeService;
use HaschaMedia\BaseTheme\Data\Wireables\SideMenuList;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Builder\Component\BaseLiveComponent;
use HaschaMedia\BaseTheme\Livewire\Wireable\WireableComponent;
use HaschaMedia\BaseTheme\Livewire\Wireable\UseWireableComponent;

class SideMenu extends BaseLiveComponent implements Componentable, WireableComponent
{
    use UseWireableComponent;

    public function mount(
        Request $request,
        string $text = "",
        string $url = "",
        ?string $icon = null,
        bool $asDropdown = false,
        array $dropdown = [],
        ?string $typeOf = null,
        array $urls = [],
        bool $isActive = false
    )
    {
        $this->dto = new SideMenuList(
            text: $text,
            url: $url,
            icon: $icon,
            asDropdown: $asDropdown,
            dropdown: $dropdown,
            typeOf: $typeOf,
            urls: $urls,
            isActive: $isActive,
        );

        $this->setup($request->baseTheme());
    }

    protected function construction(ThemeService $service)
    {
        $this->__setBase($this->dto->typeOf, function($blade) {
            return empty($blade) ? "empty" : $blade;
        });
    }

    public function baseComponent(): string
    {
        return "base::livewire.side-menu.";
    }
}