<?php

namespace Hascha\BaseTheme\View\BaseLiveComponent;

use Illuminate\Http\Request;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Data\Wireables\Button;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Builder\Component\BaseLiveComponent;
use Hascha\BaseTheme\Livewire\Wireable\WireableComponent;
use Hascha\BaseTheme\Livewire\Wireable\UseWireableComponent;

class LiveButton extends BaseLiveComponent implements Componentable, WireableComponent
{
    use Explained, UseWireableComponent;

    /**
     * Element Construction
     */
    public function mount(
        Request $request,
        string $withPrevent = "toUrl",
        ?string $typeOf = null,
        string $textButton = "Button",
        ?string $icon = null,
        string $url = "#",
        string $_dispatchTo = "",
        array|string $_dispatchValue = "",
        string $css = ""
    )
    {
        $this->dto = new Button(
            withPrevent: $withPrevent,
            typeOf: $typeOf,
            textButton: $textButton,
            icon: $icon,
            url: $url,
            _dispatchTo: $_dispatchTo,
            _dispatchValue: $_dispatchValue,
            css: $css
        );

        $this->setup($request->baseTheme());
    }

    /**
     * Start the function that must be preceded
     * @return void
     */
    protected function run()
    {
        $this->__setBase($this->dto->typeOf, function($blade) {
            return empty($blade) ? "base" : $blade;
        });
    }

    public function baseComponent(): string
    {
        return "base::livewire.live-button.";
    }

    /**
     * Redirect on click
     * @return void
     */
    public function toUrl()
    {
        $toUrl = function($_url) {
            if(empty($_url)) return url();
            return $_url;
        };

        $this->redirect($toUrl($this->dto->url));
    }

    /**
     * Dispatch on click
     * @return void
     */
    public function direction()
    {
        $_values = function(array|string $i) {
            if(is_string($i)) {
                return [$i];
            }
            return $i;
        };

        $this->dispatch($this->dto->_dispatchTo, ...$_values($this->dto->_dispatchValue));
    }
}