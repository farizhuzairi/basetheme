<?php

namespace Hascha\BaseTheme\Components\Features\Content;

use Closure;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Features\Traits\WithClasses;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Slide extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    SetViewComponent,
    WithClasses;

    /**
     * Data objects
     * @var array
     */
    protected $properties = [];

    /**
     * Data items
     * @var array
     */
    protected $items = [];

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return array_merge($this->properties, [
            'items' => $this->items
        ]);
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.content.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "slide";
    }

    /**
     * Subjectable Items
     * @return static
     */
    public function item(string $title, string $description, ?Closure $closure = null)
    {
        if($closure instanceof Closure) {
            $closure($this);
        }
        
        $this->items[] = [
            'title' => $title,
            'description' => $description,
        ];

        return $this;
    }
}