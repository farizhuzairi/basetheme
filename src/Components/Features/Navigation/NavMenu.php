<?php

namespace Hascha\BaseTheme\Components\Features\Navigation;

use Closure;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class NavMenu extends BaseComponent implements Componentable, FeatureableComponent
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
        return "base::basetheme.features.navigation.nav-menu.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "menu";
    }

    /**
     * @return static
     */
    public function typeOfMenu()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * @return string
     */
    protected function hasTypeOf(Closure|array|null $dropdown = null)
    {
        if($dropdown instanceof Closure) return 'dropdown';
        return 'list';
    }

    /**
     * @return array
     */
    protected function setMenu(array|string $text, string $url, string $typeOf, ?string $details = null)
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
            'typeOf' => $typeOf,
            'details' => $details,
        ];
    }

    /**
     * @return static
     */
    public function addMenu(array|string $text, string $url, ?Closure $dropdown = null)
    {
        $menu = $this->setMenu($text, $url, $this->hasTypeOf($dropdown));

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

    /**
     * @return static
     */
    public function subMenu(array|string $text, string $url, ?string $details = null)
    {
        $this->urls[] = $url;
        $this->subMenu = array_merge($this->subMenu, [$this->setMenu($text, $url, $this->hasTypeOf([]), $details)]);
        return $this;
    }
}