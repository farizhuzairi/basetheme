<?php

namespace HaschaMedia\BaseTheme\Features\Abstract;

use Closure;
use HaschaMedia\BaseTheme\Factory\ComponentFactory;
use HaschaMedia\BaseTheme\Exceptions\BaseThemeException;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableContent;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

abstract class CompilableService
{
    use FeatureableContent;
    
    /**
     * @var \HaschaMedia\BaseTheme\Factory\ComponentFactory
     */
    protected static $factory;

    /**
     * @var array
     */
    protected $__keys = [];

    /**
     * @var \Illuminate\Support\Collection
     */
    protected $__components;

    public function __construct(ComponentFactory $factory)
    {
        $this->__components = collect([]);
        static::$factory = $factory;
    }

    /**
     * Service Name
     * @return string
     */
    abstract protected function serviceName();

    /**
     * Add Feature Component
     * @return static
     */
    abstract public function feature(
        array|string $class,
        Closure|array $attributes = [],
        ?Closure $component = null
    );

    /**
     * Add Key
     * @return string
     */
    protected function addKey(string $key, ?string $prefix = null)
    {
        if(empty($key)) {
            throw new BaseThemeException(...defineError("Invalid key.", __CLASS__, __LINE__, 10005));
        }

        if(! empty($prefix)) {
            $key = $prefix . $key;
        }

        $this->__keys[] = $key;
        return $key;
    }

    /**
     * Has Feature in keys
     * @return bool
     */
    public function has(string $key)
    {
        return in_array($key, $this->__keys);
    }

    /**
     * Add Component Class
     * @return static
     */
    public function component(
        array|string $class,
        array $attributes = [],
        ?Closure $component = null,
        ?string $tag = null
    )
    {
        $key = null;

        if(is_array($class)) {
            $key = key($class);
            $class = $class[$key];
        }

        if(class_exists($class)) {

            if(! $component instanceof Closure) {
                $component = function($instance) {
                    return $instance;
                };
            }

            $instance = $this->makeFeature($class, $attributes, $component, static::$factory);

            if(! $instance instanceof FeatureableComponent) {
                throw new BaseThemeException(...defineError("Cannot instance FeatureableComponent interface.", __CLASS__, __LINE__, 10005));
            }

            $this->__components->put(
                $this->addKey($instance->__getClassName(), $key),
                [
                    'tag' => $tag,
                    'view' => $instance->resolveView()
                ]
            );

        }

        return $this;
    }

    /**
     * Get Components
     * @return \Illuminate\Support\Collection
     */
    public function getComponents(array $components = [], ?string $tag = null)
    {
        $results = $this->__components;

        if(! empty($components)) {
            $results = $results->only($components);
        }

        if(! empty($tag)) {
            $results = $results->where('tag', $tag);
        }

        return $results;
    }
}