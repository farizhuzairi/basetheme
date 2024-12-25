<?php

namespace Hascha\BaseTheme\Contracts;

use Closure;
use Hascha\BaseTheme\Contracts\Theme\Themeable;
use Hascha\BaseTheme\Contracts\Layout\Layoutable;
use Hascha\BaseTheme\Contracts\Element\Elementable;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

interface Layouting
{
    /**
     * @param \Hascha\BaseTheme\Contracts\Layout\Layoutable $layout
     * @return void
     */
    public function visitNewLayout(Layoutable $layout);

    /**
     * @param \Hascha\BaseTheme\Contracts\Theme\Themeable $theme
     * @return void
     */
    public function visitTheme(Themeable $theme);

    /**
     * @param \Hascha\BaseTheme\Contracts\Element\Elementable $element
     * @return void
     */
    public function visitElement(Elementable $element, string $key);

    /**
     * @param \Hascha\BaseTheme\Contracts\Component\FeatureableComponent $component
     * @return \Hascha\BaseTheme\Contracts\Component\Componentable|\Hascha\BaseTheme\Contracts\Component\FeatureableComponent|\Illuminate\Contracts\View\View|null
     */
    public function visitComponent(FeatureableComponent $component);
}