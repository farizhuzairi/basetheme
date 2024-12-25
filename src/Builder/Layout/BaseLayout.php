<?php

namespace HaschaMedia\BaseTheme\Builder\Layout;

use Illuminate\View\Component;
use HaschaMedia\BaseTheme\Contracts\Layouting;
use HaschaMedia\BaseTheme\Traits\View\Renderable;
use HaschaMedia\BaseTheme\Traits\Factory\UseLayout;

abstract class BaseLayout extends Component
{
    use UseLayout, Renderable;

    /**
     * Override component directory
     * @return string
     */
    protected function baseComponent()
    {
        return "base::basetheme.layout.";
    }
    
    /**
     * @var string
     */
    public $_layout;
    
    /**
     * @var string
     */
    public $_title;

    public function __construct(string $layout, ?string $title = null)
    {
        $this->_layout = $layout;
        $this->_title = $title;

        $this->withName($this->__getClassName());
        $this->setup();
    }

    /**
     * requirement setup,
     * semua pengaturan awal dan konfigurasi bawaan dari layout
     * 
     * @return void
     */
    final protected function setup(array $data = [])
    {}

    /**
     * @return string
     */
    public function getLayout()
    {
        return $this->_layout;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param \HaschaMedia\BaseTheme\Contracts\Layouting $builder
     * @return void
     */
    public function accept(Layouting $builder)
    {
        $builder->visitNewLayout($this);
    }
}