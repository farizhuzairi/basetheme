<?php

namespace Hascha\BaseTheme\Traits\View;

use Closure;
use Illuminate\Support\Collection;
use Hascha\BaseTheme\Traits\Nameable;
use Hascha\BaseTheme\Exceptions\BaseThemeException;

trait Renderable
{
    use Nameable;

    // /**
    //  * Unique ID
    //  * @var string
    //  */
    // public $_baseId;

    // /**
    //  * set Unique ID
    //  * @return void
    //  */
    // public function __setBaseId()
    // {
    //     $this->_baseId = Str::random(12);
    // }

    /**
     * @var \Illuminate\Support\Collection
     */
    public $dataCompacts;

    /**
     * @var array
     */
    public $slotableData = [];

    /**
     * @var string
     */
    public $__base;

    /**
     * Method default ini harus di-override jika memerlukan kustomisasi atau perubahan direktori dasar komponen yang akan diteruskan dan dirender.
     * @return string
     */
    protected function baseComponent()
    {
        return "base::basetheme.";
    }

    public function __setBase(?string $component, ?Closure $closure = null): void
    {
        if($closure instanceof Closure) {
            $component = $closure($component);
        }

        $this->__base = $component;
    }

    public function __getBase(): string
    {
        $base = $this->__base ?? \Illuminate\Support\Str::snake($this->__getClassName(), '-');
        return $this->baseComponent() . $base;
    }

    /**
     * @return array
     */
    public function defaultables()
    {
        return [];
    }

    /**
     * @return static
     */
    public function addDataCompact(array|string $key, mixed $data = null)
    {
        if(! $this->dataCompacts instanceof Collection) {
            $this->dataCompacts = collect();
        }

        if(is_array($key)) {
            $this->dataCompacts = $this->dataCompacts->mergeRecursive($key);
        }

        elseif(is_string($key)) {
            $this->dataCompacts = $this->dataCompacts->put($key, $data);
        }

        else {
            throw new BaseThemeException(...defineError("Invalid data.", __CLASS__, __LINE__, 0));
        }

        return $this;
    }

    /**
     * Add Data Compact
     * @return static
     */
    public function with(array|string $key, mixed $data = null)
    {
        return $this->addDataCompact($key, $data);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getDataCompacts()
    {
        $data = $this->dataCompacts;
        if(! $data instanceof Collection) {
            $data = collect([]);
        }

        foreach($this->defaultables() as $_i => $_value) {
            if(! $data->has($_i) && ! property_exists($this, $_i)) {
                $data = $data->put($_i, $_value);
            }
            elseif(! $data->has($_i) && property_exists($this, $_i)) {
                if(empty($this->{$_i})) $this->{$_i} = $_value;
            }
        }

        if(method_exists($this, "featureables")) {
            $data = $this->featureables($data->toArray());
        }

        if(method_exists($this, 'featureableContents')) {
            $data = $this->featureableContents($data);
        }

        if(property_exists($this, 'emptyText')) {
            $data = $data->put('emptyText', 'Tidak ada data');
        }

        return $data->put('refName', $this->__getClassName());
    }

    /**
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $__component = $this->__getBase();
        $dataCompacts = $this->getDataCompacts()->toArray();

        /**
         * Render component Blade, with Slotable as optional
         */
        if(method_exists($this, 'view')) {
            return $this->view($__component, $dataCompacts, $this->slotableData);
        }

        /**
         * Livewire component rendering
         */
        if(! $this->container) {
            $dataCompacts = [];
        }
        return view($__component, $dataCompacts);
    }
}