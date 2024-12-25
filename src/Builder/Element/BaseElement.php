<?php

namespace Hascha\BaseTheme\Builder\Element;

use Illuminate\View\Component;
use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Traits\View\Renderable;
use Hascha\BaseTheme\Traits\Factory\UseTheme;

abstract class BaseElement extends Component
{
    use Renderable, UseTheme;

    /**
     * @var array
     */
    protected $features = [];

    /**
     * @var string
     */
    protected $theme;
    
    /**
     * Override component directory
     * @return string
     */
    protected function baseComponent()
    {
        return "base::basetheme.elements.";
    }

    /**
     * Element Construction
     */
    public function __construct(
        ?string $theme = null,
        ...$data
    )
    {
        if(!empty($theme)) {
            $this->theme = $theme;
        }

        $this->withName($this->__getClassName());
        $this->setup($data);
    }

    /**
     * Initializer View Component
     * @return void
     */
    protected function initializeViewComponent(string $element, ?string $theme)
    {
        $component = function(string $element, ?string $theme) {
            $theme = $this->useTheme('theme', $theme);
            $components = themeConfig()->elementComponents($element);

            if(array_key_exists($theme, $components)) {
                return $components[$theme];
            }

            elseif(array_key_exists('default', $components)) {
                return $components['default'];
            }
            
            else {
                return $components[$this->__getClassName()];
            }

        };

        $this->__setBase($component($element, $theme));
    }

    /**
     * Specify all components (Components) or live components (Live Components) that may be available as Featured Components in this element.
     * @return array
     */
    protected function features()
    {
        return [];
    }

    /**
     * Add Feature Components
     * @return static
     */
    public function addFeature(string $key, mixed $data = null)
    {
        if(is_string($key) && ! empty($key)) {
            $this->features[$key] = $data;
        }

        elseif(is_array($key)) {
            $this->features = array_merge($this->features, $key);
        }

        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    final public function featureableComponents()
    {
        return collect($this->features);
    }

    /**
     * requirement setup,
     * semua pengaturan awal dan konfigurasi bawaan dari tema
     * 
     */
    final protected function setup(array $data = [])
    {
        if(! empty($data)) $this->addDataCompact($data);
        $this->features = $this->features();
    }
    
    /**
     * @param \Hascha\BaseTheme\Contracts\Layouting $builder
     * @return void
     */
    public function accept(Layouting $builder)
    {
        $builder->visitElement($this, $this->__getClassName());
    }
}