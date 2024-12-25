<?php

namespace Hascha\BaseTheme\Builder\Component;

use Illuminate\View\Component;
use Hascha\BaseTheme\Traits\AltKey;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Traits\View\Renderable;

abstract class BaseComponent extends Component
{
    use Renderable, AltKey;

    /**
     * The properties / methods that should not be exposed to the component.
     *
     * @var array
     */
    protected $except = [
        'dataCompacts',
        'slotableData',
        'defaultables',
        'getDataCompacts',
        'addDataCompact',
        'featureables',
    ];

    /**
     * html permission
     * @var bool
     */
    public $container = false;
    
    /**
     * Override component directory
     * @return string
     */
    protected function baseComponent()
    {
        return "components.";
    }

    /**
     * Element Construction
     */
    public function __construct(
        ...$data
    )
    {
        foreach([
            'construction' => ['service' => baseTheme()],
        ] as $_k => $_v) {
            $this->$_k(...$_v);
        }

        $this->setup($data);
    }

    /**
     * Start the function that must be preceded
     * @return void
     */
    protected function construction(ThemeService $service)
    {}

    /**
     * requirement setup,
     * semua pengaturan awal dan konfigurasi bawaan dari tema
     * 
     */
    final protected function setup(array $data = [])
    {
        if(method_exists($this, 'explain')) {
            $data = array_merge($data, baseTheme()->privateData($this->explain()));
            if(isset($data['isRendered'])) $this->container = $data['isRendered'];
        }
        else{
            $this->container = $data['isRendered'] ?? true;
        }

        if(method_exists($this, 'altContent')) {
            $_alt = baseTheme()->slotable($this->alt_key($this->__getClassName()));
            $this->slotableData = $this->altContent($_alt);
        }

        // single component with data array
        if(isset($data['data'])) {
            $data = array_merge($data, $data['data']);
        }

        // add Css class
        if(! isset($data['addClass'])) {
            $data = array_merge($data, ['addClass' => '']);
        }
        
        $this->withName($data['name'] ?? $this->__getClassName());
        $this->addDataCompact($data);
    }

    /**
     * Determine if the component should be rendered.
     *
     * @return bool
     */
    public function shouldRender()
    {
        return $this->container;
    }

    /**
     * Build Data
     * @return void
     */
    public function buildUp()
    {
        $this->collection([]);
    }
}