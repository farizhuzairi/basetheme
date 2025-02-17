<?php

namespace Hascha\BaseTheme\Features\Traits;

use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

trait WithThemeColor
{
    protected ?string $themeColor = null;

    protected function useThemeColor(): array
    {
        return [
            'themeColor' => $this->themeColor,
        ];
    }

    public function themeColor(string $color)
    {
        $this->themeColor = (string) $color;
        return $this;
    }
}