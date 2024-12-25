<?php

namespace HaschaMedia\BaseTheme\View\LiveFeatures\Charts;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Builder\Component\BaseLiveComponent;

class Index extends BaseLiveComponent implements Componentable
{
    use Explained;
    
    /**
     * options:
     * bar
     */
    public ?string $typeOf = null;

    // Attributes ...
    public ?string $label = null;
    public int $pts = 0;

    /**
     * for css class
     * @var string
     */
    public $wpts;

    public function baseComponent(): string
    {
        return "base::live-features.charts.";
    }

    /**
     * perhitungan nilai pts
     * @return void
     */
    protected function valuable(int $pts)
    {
        $this->wpts = "wpts-{$pts}";
    }

    /**
     * Start the function that must be preceded
     * @return void
     */
    protected function run()
    {
        $this->valuable($this->pts);

        $this->__setBase($this->typeOf, function($blade) {
            return empty($blade) ? "bar" : $blade;
        });
    }
}