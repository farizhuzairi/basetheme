<?php

namespace Hascha\BaseTheme\View\BaseLiveComponent\Board;

use Livewire\Attributes\Isolate;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Livewire\Synth\UseSynthComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Builder\Component\BaseLiveComponent;

#[Isolate]
class Index extends BaseLiveComponent implements Componentable
{
    use Explained, UseSynthComponent;

    public function baseComponent(): string
    {
        return "base::livewire.board.";
    }
}