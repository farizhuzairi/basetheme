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

    /**
     * Add Style Content Class
     * @var string|null
     */
    protected ?string $contentClasses = null;

    /**
     * Add Stylesheets
     * @var string|null
     */
    protected ?string $stylesheets = null;

    /**
     * Add Content Stylesheets
     * @var string|null
     */
    protected ?string $contentStylesheets = null;

    public function classes(string $classes, ?string $contentClasses = null)
    {
        $this->classes = (string) $classes;
        $this->contentClasses = (string) $contentClasses;
        return $this;
    }

    public function style(string $style, ?string $contentStylesheets = null)
    {
        $this->stylesheets = (string) $style;
        $this->contentStylesheets = (string) $contentStylesheets;
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