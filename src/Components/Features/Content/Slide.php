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
     * Fill Data (Temporary)
     * @var array
     */
    protected $fill = [];

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
     * Headline
     * @return static
     */
    public function headline(string $title, ?string $description = null, ?Closure $fill = null)
    {
        if($fill instanceof Closure) {
            $fill($this);
        }

        $this->properties['title'] = $title;
        $this->properties['description'] = $description;
        $this->properties['fill'] = $this->fill;

        $this->fill = [];
        return $this;
    }

    /**
     * Fill Functionable
     * @return static
     */
    public function fill(string $fill, string $typeOf = "icon", ?string $css = null)
    {
        if($typeOf === "icon" || $typeOf === "image") {
            $this->fill = [
                'type' => $typeOf, // icon or image
                'fill' => $fill,
                'css' => $css,
            ];
        }

        return $this;
    }

    /**
     * Items
     * @return static
     */
    public function item(string $title, string $description, ?Closure $closure = null)
    {
        if($closure instanceof Closure) {
            $closure($this);
        }
        else {
            $this->fill = [
                // 'type' => 'icon',
                // 'fill' => 'hascha-layers1',
                // 'css' => null,
            ];
        }
        
        $this->items[] = [
            'title' => $title,
            'description' => $description,
            'fill' => $this->fill,
        ];

        $this->fill = [];
        return $this;
    }
}