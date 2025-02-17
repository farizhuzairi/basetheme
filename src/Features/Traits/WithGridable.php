<?php

namespace Hascha\BaseTheme\Features\Traits;

use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

trait WithGridable
{
    protected int|array $gridCount = 0;

    protected function useGridable(): array
    {
        return [
            'gridCount' => $this->gridCount,
        ];
    }

    public function gridable(int $all = 0, int $md = 0, int $lg = 0)
    {
        if($all > 0 && $md > 0 || $md > 0 || $lg > 0) {
            $this->gridCount = [
                'sm' => (int) $all,
                'md' => (int) $md,
                'lg' => (int) $lg,
            ];
        }
        else {
            $this->gridCount = (int) $all;
        }

        return $this;
    }
}