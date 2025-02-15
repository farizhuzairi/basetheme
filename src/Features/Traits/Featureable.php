<?php

namespace Hascha\BaseTheme\Features\Traits;

use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

trait Featureable
{
    /**
     * A property or object that moves data to a live service.
     * @var array
     */
    protected array $_props = [];

    /**
     * Key
     * @var string
     */
    protected string $_key = "";

    /**
     * Dto Class
     * @var string|null
     */
    protected ?string $dtoClass = null;

    // /**
    //  * A property or object that moves data to a live service.
    //  * @var array
    //  */
    // protected array $_transferrer = [];

    /**
     * Featureables
     * @return \Illuminate\Support\Collection
     */
    protected function featureables(array $data = [])
    {
        $results = $data;
        
        if(method_exists($this, "useBadgeInformation")) {
            $results = array_merge($results, $this->useBadgeInformation());
        }

        if(property_exists($this, 'classes')) {
            $results = array_merge($results, [
                'class' => $this->classes,
                'contentClass' => $this->contentClasses
            ]); // add style classes
            $results = array_merge($results, $this->classVars); // class name vars
        }

        if(property_exists($this, 'style')) {
            $results = array_merge($results, [
                'style' => $this->stylesheets,
                'contentStyle' => $this->contentStylesheets
            ]); // add stylesheets
        }
        
        if(method_exists($this, "features")) {
            $results = array_merge($results, $this->features($data));
        }

        if(method_exists($this, "subjectable")) {
            $results = $this->subjectable($results);
        }

        if(method_exists($this, "linkable")) {
            $results = $this->linkable($results);
        }

        return collect($results)->put('_key', $this->_key);
    }

    /**
     * Filter Data
     * @return void
     */
    protected function collection(
        array $props = []
    )
    {
        if(empty($this->_key)) {
            $this->_key = \Illuminate\Support\Str::random(12);
        }

        $this->_props = $props;
    }

    /**
     * get Key
     * @return string
     */
    public function __getKey()
    {
        return $this->_key;
    }

    /**
     * get _props
     * @return array
     */
    public function __getProps()
    {
        try {
            return $this->_props;
        }
        finally {
            $this->_props = [];
        }
    }

    /**
     * dtoClass
     * @return string
     */
    protected function dtoClass()
    {
        return $this->dtoClass;
    }

    /**
     * Transfer Data
     * @return static
     */
    public function dataModel(string $dtoClass)
    {
        $this->dtoClass = $dtoClass;
        return $this;
    }

    /**
     * get data (results)
     * @return array
     */
    public function getResults()
    {
        $this->buildUp();
        $result = $this->__getProps();

        unset($result['dtoClass']);
        return $result;
    }

    /**
     * @param \Hascha\BaseTheme\Contracts\Layouting $builder
     * @return \Hascha\BaseTheme\Contracts\Component\FeatureableComponent|null
     */
    public function accept(Layouting $builder): FeatureableComponent
    {
        return $builder->visitComponent($this);
    }
}