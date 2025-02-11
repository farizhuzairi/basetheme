<?php

namespace Hascha\BaseTheme\Features\Traits;

use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

trait WithClasses
{
    /**
     * Add Style Class
     * @var string|null
     */
    protected ?string $classes = null;

    public function classes(string $classes)
    {
        $this->classes = (string) $classes;
        return $this;
    }

    /**
     * Class Name Variables
     * @var array
     */
    protected array $classVars = [

        /**
         * true | false
         */
        'withBox' => true,

        /**
         * null | light | dark | white
         */
        'boxColor' => null, 

    ];

    /**
     * with Boxes
     * @return static
     */
    public function withBox(bool $isBox = true, ?string $boxColor = null)
    {
        $this->classVars['withBox'] = $isBox;
        $this->classVars['boxColor'] = $boxColor;
        return $this;
    }
}