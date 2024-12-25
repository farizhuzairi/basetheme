<?php

namespace Hascha\BaseTheme\Data\Wireables;

use Closure;
use Hascha\BaseTheme\Livewire\BaseWireable;

class HeroMenuBar extends BaseWireable
{
    /**
     * @return array
     */
    protected array $items = [];

    public function __construct(array $data = [])
    {
        if($data) {
            $this->items = array_merge($this->items, $data);
        }
    }
    
    /**
     * Implement to define an object or property
     * @return array
     */
    protected static function properties()
    {
        return [
            'items',
        ];
    }

    /**
     * @return string
     */
    protected static function class()
    {
        return static::class;
    }

    /**
     * Add Items
     * @return static
     */
    public function item(string $title, string $url)
    {
        $this->items[] = [
            'title' => $title,
            'url' => $url,
        ];

        return $this;
    }
}