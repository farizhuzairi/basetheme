<?php

namespace Hascha\BaseTheme\View\LiveFeatures\Gridable;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Builder\Component\BaseLiveComponent;

class Item extends BaseLiveComponent implements Componentable
{
    use Explained;
    
    public ?string $typeOf = null;

    // Attributes ...
    public string $title;
    public ?string $subTitle;
    public array $buttons = [];
    public array $details = [];

    public function baseComponent(): string
    {
        return "base::live-features.gridable.";
    }

    /**
     * Start the function that must be preceded
     * @return void
     */
    protected function run()
    {
        $this->__setBase('item', function($blade) {
            return empty($blade) ? "item" : $blade;
        });
    }
}