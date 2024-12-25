<?php

namespace Hascha\BaseTheme\Services;

use Hascha\BaseTheme\Contracts\Explainable;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Traits\Has\HasGlobalDataComposer;

final class ExplainService implements Explainable
{
    use HasGlobalDataComposer;
    
    /**
     * @var \Hascha\BaseTheme\Services\ThemeService
     */
    private static $service;

    /**
     * @var string
     */
    private $key;

    /**
     * @var bool
     */
    private $isRendered;

    // default base component active
    public const USED = true;

    public function __construct(ThemeService $service)
    {
        static::$service = $service;
    }

    public function instance(): Explainable
    {
        return $this;
    }

    /**
     * Add Global Data
     * @return void
     */
    public function compile(string $key, mixed $data = null)
    {
        static::$service->withData($this->global_key($key), $data);
    }

    /**
     * Has Global Data
     * @return bool
     */
    public function hasCompile(string $key)
    {
        return static::$service->hasData($this->global_key($key));
    }
    
    /**
     * Use Base Component
     * @return static
     */
    public function __call(string $name, mixed $args)
    {
        $useable = function(mixed $used) {
            if(is_bool($used)) return $used;
            return static::USED;
        };

        $this->key = $name;
        $this->isRendered = isset($args[0]) ? $useable($args[0]) : static::USED;

        return $this;
    }

    /**
     * Add Data Alternative
     * @return static
     */
    public function slot(array $data)
    {
        if(! empty($this->key)) static::$service->addToSlot($this->key, $data);
        return $this;
    }

    /**
     * Add Data Component
     * @return void
     */
    public function data(array $data = [])
    {
        if(! empty($this->key)) {
            static::$service->addPrivateData(
                $this->key,
                array_merge($data, ['isRendered' => $this->isRendered])
            );
        }

        $this->reset_data();
    }

    /**
     * Reset data
     * @return void
     */
    private function reset_data()
    {
        unset($this->key);
        unset($this->isRendered);
    }

    /**
     * @return string
     */
    public function component(string $blade)
    {
        $blade = \Illuminate\Support\Str::kebab($blade);
        return "component::{$blade}";
    }
}