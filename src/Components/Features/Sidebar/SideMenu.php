<?php

namespace HaschaMedia\BaseTheme\Components\Features\Sidebar;

use Closure;
use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Features\Traits\Featureable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableSubject;
use HaschaMedia\BaseTheme\Traits\Components\SetViewComponent;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

class SideMenu extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    SetViewComponent;
    
    /**
     * Data Menu
     * @var array
     */
    protected array $menu = [];

    /**
     * Helper Attribute for Menu with Instance Feature Component
     * @var array
     */
    protected $subMenu = [];

    /**
     * Dropdown Tab Key
     * @var array
     */
    protected $urls = [];

    public function __construct(
        public ?string $title = null,
    )
    {
        parent::__construct(subject: $title);

        $this->typeOfIndex();
    }

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'menu' => $this->menu,
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.side-menu.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "index";
    }

    /**
     * type of counter
     * @return static
     */
    public function typeOfIndex()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * @return static
     */
    public function addMenu(array|string $text, string $url, ?Closure $dropdown = null)
    {
        $menu = $this->setMenu($text, $url);

        if($dropdown instanceof Closure) {
            $dropdown($this);

            if(! empty($this->subMenu)) {

                $menu = array_merge($menu, [
                    'urls' => $this->urls,
                    'dropdown' => $this->subMenu
                ]);

                $this->urls = [];
                $this->subMenu = [];
            }
        }

        $this->menu = array_merge($this->menu, [$menu]);
        return $this;
    }

    // public function on()
    // {
    //     $key = array_key_last($this->menu);
    //     $last = $this->menu[$key];
    //     $this->menu[$key] = array_merge($last, [
    //         'authorization' => function($user) {
    //             return $user ? true : false;
    //         },
    //     ]);
    //     return $this;
    // }

    /**
     * @return array
     */
    protected function setMenu(array|string $text, string $url)
    {
        $icon = null;

        if(is_array($text)) {
            $icon = key($text);
            $text = $text[$icon];
        }

        return [
            'text' => $text,
            'url' => $url,
            'icon' => $icon,
        ];
    }

    /**
     * @return static
     */
    public function subMenu(array|string $text, string $url)
    {
        $this->urls[] = $url;
        $this->subMenu = array_merge($this->subMenu, [$this->setMenu($text, $url)]);
        return $this;
    }
}