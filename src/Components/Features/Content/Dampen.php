<?php

namespace Hascha\BaseTheme\Components\Features\Content;

use Closure;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Features\Traits\WithClasses;
use Hascha\BaseTheme\Features\Traits\WithReadmore;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Dampen extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    SetViewComponent,
    WithClasses,
    WithReadmore;

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
     * Data lists (Temporary)
     * @var array
     */
    protected $lists = [];

    /**
     * Order tags (Temporary)
     * @var array
     */
    protected $tags = [];

    /**
     * Button Element (Temporary)
     * @var array
     */
    protected $button = [];

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return array_merge($this->properties, [
            'items' => $this->items,
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
        return "dampen";
    }

    /**
     * Subjectable
     * @return static
     */
    public function item(string $title, string $subTitle, ?Closure $closure = null)
    {
        if($closure instanceof Closure) {
            $closure($this);
        }
        
        $this->items[] = [
            'title' => $title,
            'subTitle' => $subTitle,
            'tags' => $this->tags,
            'lists' => $this->lists,
            'button' => $this->button,
            'readmore' => $this->readmore
        ];

        $this->tags = [];
        $this->lists = [];
        $this->button = [];
        $this->readmore = [];
        return $this;
    }

    /**
     * Order Tags
     * @return static
     */
    public function tag(string|int $label, ?string $text = null, ?string $class = null)
    {
        $this->tags[] = [
            'label' => $label,
            'text' => $text,
            'class' => $class,
        ];
        return $this;
    }

    /**
     * Lists
     * @return static
     */
    public function list(string $label, string $description, string $icon = "hascha-check")
    {
        $this->lists[] = [
            'label' => $label,
            'description' => $description,
            'icon' => $icon,
        ];
        return $this;
    }

    /**
     * Button element
     * @return static
     */
    public function button(string $text, string $icon = "hascha-lock_open")
    {
        $this->button = [
            'text' => $text,
            'icon' => $icon,
        ];
        return $this;
    }
}