<?php

namespace HaschaMedia\BaseTheme\Builder\Component;

use Livewire\Component;
use Illuminate\Http\Request;
use HaschaMedia\BaseTheme\Traits\AltKey;
use HaschaMedia\BaseTheme\Services\ThemeService;
use HaschaMedia\BaseTheme\Traits\View\Renderable;

abstract class BaseLiveComponent extends Component
{
    use Renderable, AltKey;

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
        return "livewire.";
    }

    /**
     * Element Construction
     */
    public function mount(Request $request)
    {
        $this->setup($request->baseTheme());
    }

    /**
     * Define additional initial construction manually
     * @return void
     */
    protected function construction(ThemeService $service)
    {}

    /**
     * Start the function that must be preceded
     * @return void
     */
    protected function run()
    {}

    /**
     * requirement setup,
     * semua pengaturan awal dan konfigurasi bawaan dari tema
     * 
     */
    final protected function setup(ThemeService $service, ?string $key = null, ?string $ref = null)
    {
        foreach([
            'construction' => ['service' => $service],
            'run' => [],
        ] as $_k => $_v) {
            $this->$_k(...$_v);
        }

        $data = [];

        // Rendering access with permission
        $rendering = function($access, $data) {
            if($access) {
                if(isset($data['isRendered'])) {
                    return $data['isRendered'];
                }
                return true;
            }
            return false;
        };


        if(method_exists($this, 'explain')) {
            $extra = $service->privateData($this->explain($key, $ref));

            if($this->toExplain()) {
                $extra = collect($extra);
                foreach($extra->toArray() as $_key => $i) {
                    if(property_exists($this, $_key)) {
                        $this->fill([$_key => $i]);
                        $extra->forget($_key);
                    }
                }
                $extra = $extra->toArray();
            }

            $data = array_merge($data, $extra);
            $this->container = $rendering($this->permission(), $extra);
        }
        else{
            $this->container = $rendering($this->permission(), $data);
        }

        $this->addDataCompact($data);
    }

    /**
     * Menimpa explain dengan objek atau properti.
     * 'Override' untuk mengubah perilaku ini; hanya bekerja jika terdapat nilai explain.
     * @return bool
     */
    protected function toExplain()
    {
        return true;
    }

    /**
     * Has Permission
     * @return bool
     */
    protected function permission()
    {
        return true;
    }
}