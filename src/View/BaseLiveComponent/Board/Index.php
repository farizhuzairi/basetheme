<?php

namespace HaschaMedia\BaseTheme\View\BaseLiveComponent\Board;

use Livewire\Attributes\Isolate;
use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Livewire\Synth\UseSynthComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Builder\Component\BaseLiveComponent;

#[Isolate]
class Index extends BaseLiveComponent implements Componentable
{
    use Explained, UseSynthComponent;

    public function baseComponent(): string
    {
        return "base::livewire.board.";
    }
}