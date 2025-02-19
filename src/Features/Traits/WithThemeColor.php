<?php

namespace Hascha\BaseTheme\Features\Traits;

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