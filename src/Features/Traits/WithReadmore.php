<?php

namespace Hascha\BaseTheme\Features\Traits;

trait WithReadmore
{
    /**
     * Readmore Variable
     * @var array
     */
    protected $readmore = [];

    protected function useReadmore(): array
    {
        return [
            'readmore' => $this->readmore,
        ];
    }

    /**
     * Readmore URL element
     * @return static
     */
    public function readmore(string $text, string $url = '#', string $icon = "hascha-trending_neutral")
    {
        $this->readmore = [
            'text' => $text,
            'url' => $url,
            'icon' => $icon,
        ];
        return $this;
    }
}