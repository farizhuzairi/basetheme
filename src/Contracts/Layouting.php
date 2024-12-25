<?php

namespace HaschaMedia\BaseTheme\Contracts;

use Closure;
use HaschaMedia\BaseTheme\Contracts\Theme\Themeable;
use HaschaMedia\BaseTheme\Contracts\Layout\Layoutable;
use HaschaMedia\BaseTheme\Contracts\Element\Elementable;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

interface Layouting
{
    /**
     * @param \HaschaMedia\BaseTheme\Contracts\Layout\Layoutable $layout
     * @return void
     */
    public function visitNewLayout(Layoutable $layout);

    /**
     * @param \HaschaMedia\BaseTheme\Contracts\Theme\Themeable $theme
     * @return void
     */
    public function visitTheme(Themeable $theme);

    /**
     * @param \HaschaMedia\BaseTheme\Contracts\Element\Elementable $element
     * @return void
     */
    public function visitElement(Elementable $element, string $key);

    /**
     * @param \HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent $component
     * @return \HaschaMedia\BaseTheme\Contracts\Component\Componentable|\HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent|\Illuminate\Contracts\View\View|null
     */
    public function visitComponent(FeatureableComponent $component);
}