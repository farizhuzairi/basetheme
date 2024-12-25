<?php

namespace Hascha\BaseTheme\Builder\Theme;

use Illuminate\View\Component;
use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Traits\View\Renderable;
use Hascha\BaseTheme\Traits\Factory\UseTheme;

abstract class BaseTheme extends Component
{
    use UseTheme, Renderable;

    /**
     * Override component directory
     * @return string
     */
    protected function baseComponent()
    {
        return "base::basetheme.theme.";
    }

    /**
     * @var string
     */
    protected $_theme;

    /**
     * @var string
     */
    protected $_alias;

    /**
     * @var string
     */
    protected $_title;

    /**
     * Theme Construction
     */
    public function __construct(
        string $theme,
        string $alias,
        string $title,
    )
    {
        $this->_theme = $theme;
        $this->_alias = $alias;
        $this->_title = $title;

        $this->withName(($this->alias ?? $this->__getClassName()));
        $this->setup();
    }

    /**
     * requirement setup,
     * semua pengaturan awal dan konfigurasi bawaan dari tema
     * 
     */
    final protected function setup(array $data = [])
    {
        $this->__setBase($this->_theme);
    }

    final public function getTheme(): string
    {
        return $this->_theme;
    }

    final public function getAlias(): string
    {
        return $this->_alias;
    }

    public function getTitle(): string
    {
        return $this->_title;
    }
    
    /**
     * @param \Hascha\BaseTheme\Contracts\Layouting $builder
     * @return void
     */
    public function accept(Layouting $builder)
    {
        $builder->visitTheme($this);
    }
}