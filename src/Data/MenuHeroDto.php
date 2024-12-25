<?php

namespace HaschaMedia\BaseTheme\Data;

use Illuminate\Contracts\Support\Arrayable;
use HaschaMedia\BaseTheme\Data\Wireables\HeroMenuBar;
use HaschaMedia\BaseTheme\Data\Wireables\HeroStackedItems;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableLiveContent;

abstract class MenuHeroDto implements Arrayable
{
    use FeatureableLiveContent;

    public ?string $subject = null;
    public ?string $subDescription = null;

    public function __construct(
        public ?string $title = null,
    )
    {
        $this->liveFeatureContents();

        $results = $this->construction();
        foreach(static::properties() as $i) {
            if(empty($this->{$i}) && isset($results[$i])) {
                $this->{$i} = $results[$i];
            }
        }
    }

    /**
     * Create New Data Results
     * @return array
     */
    abstract public function construction();

    /**
     * Implement to define an object or property
     * @return array
     */
    public static function properties()
    {
        return [
            'subject',
            'title',
            'subDescription'
        ];
    }

    /**
     * Arrayable implements.
     * 'Override' to configure array data return
     * @return array
     */
    public function toArray()
    {
        $arr = [];
        foreach(static::properties() as $i) {
            $arr[$i] = $this->{$i};
        }
        
        return $arr;
    }
}