<?php

namespace Hascha\BaseTheme\Features\Traits;

use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

trait WithButton
{
    /**
     * Button Text
     * @var string
     */
    protected string $buttonText = 'Button';

    protected function useButton(): array
    {
        return [
            'text' => $this->buttonText,
        ];
    }

    public function button(string $text)
    {
        $this->buttonText = (string) $text;
        return $this;
    }
}