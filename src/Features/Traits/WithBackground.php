<?php

namespace Hascha\BaseTheme\Features\Traits;

use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

trait WithBackground
{
    protected ?string $bgImage = null;
    protected ?string $bgStyle = null;

    /**
     * Background Style
     * @return static
     */
    public function background(string $image, ?string $style = null)
    {
        $this->bgImage = $image;
        $this->bgStyle = $style;
        return $this;
    }
}