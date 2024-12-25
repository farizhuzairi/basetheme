<?php

namespace Hascha\BaseTheme\Data\Wireables;

use Hascha\BaseTheme\Livewire\BaseWireable;

class SideMenuList extends BaseWireable
{
    public function __construct(
        public string $text = "",
        public string $url = "",
        public ?string $icon = null,
        public bool $asDropdown = false,
        public array $dropdown = [],
        public ?string $typeOf = null,
        public array $urls = [],
        public bool $isActive = false
    )
    {
        if($icon === null && ! $asDropdown) {
            $this->icon = 'hascha-trending_neutral';
        }

        elseif($icon === null && $asDropdown) {
            $this->icon = 'hascha-subdirectory-right';
        }

        $set_typeOf = function($dropdown) {
            if(! empty($dropdown)) return "dropdown";
            return "list";
        };

        $typeOf = $typeOf ?: $set_typeOf($dropdown);

        $this->typeOf = match($typeOf) {
            "list" => "list",
            "dropdown" => "dropdown",
            default => "list",
        };

        if(! empty($urls)) {
            $this->isActive = in_array(request()->url(), $urls) ? true : false;
        }
    }
    
    /**
     * Implement to define an object or property
     * @return array
     */
    protected static function properties()
    {
        return [
            'text',
            'url',
            'icon',
            'asDropdown',
            'dropdown',
            'typeOf',
            'urls',
            'isActive',
        ];
    }

    /**
     * @return string
     */
    protected static function class()
    {
        return static::class;
    }
}