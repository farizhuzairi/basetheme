<?php

namespace Hascha\BaseTheme\Features\Traits;

use Closure;
use Hascha\BaseTheme\Factory\ComponentFactory;
use Hascha\BaseTheme\Exceptions\BaseThemeException;

trait FeatureableConstruct
{
    public function __construct(ComponentFactory $factory)
    {
        parent::__construct($factory);
    }

    /**
     * get Instance Service
     * @return static
     */
    public function instance()
    {
        return $this;
    }

    /**
     * Add Feature Component: Global
     * @return static
     */
    public function feature(
        array|string $class,
        Closure|array $attributes = [],
        ?Closure $component = null,
        ?string $tag = null
    )
    {
        if($attributes instanceof Closure) {
            $component = $attributes;
            $attributes = [];
        }

        return $this->component($class, $attributes, $component, $tag);
    }

    /**
     * Add Feature Component: Specified
     * @return mixed
     */
    public function __call(string $tag, mixed $args)
    {
        $services = collect(themeConfig()->contents())->first(function(mixed $value, string $key) {
            return $key === $this->serviceName();
        });
        $services = ! empty($services) ? $services['methods'] : [];

        if(in_array($tag, $services) && ! empty($args)) {

            if(! isset($args[0]) && ! isset($args[1])) {
                throw new BaseThemeException(...defineError("Invalid arguments class or attributes.", __CLASS__, __LINE__, 10006));
            }

            $_class = $args[0];
            $_attributes = $args[1];
            $_component = isset($args[2]) ? $args[2] : null;

            if($_attributes instanceof Closure) {
                $_component = $_attributes;
                $_attributes = [];
            }

            return $this->component($_class, $_attributes, $_component, $tag);
        }

        return null;
    }
}