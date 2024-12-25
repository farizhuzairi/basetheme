<?php

namespace Hascha\BaseTheme\Livewire\Synth;

use Illuminate\Http\Request;
use Hascha\BaseTheme\Livewire\Synth\Synthable;
use Hascha\BaseTheme\Exceptions\BaseThemeException;

trait UseSynthComponent
{
    public Synthable $dto;
    public array $arrData = [];
    protected string $dtoClass;
    
    /**
     * Element Construction
     */
    public function mount(
        Request $request,
        string $_key = "",
        string $refName = "",
    )
    {
        $this->liveData($_key, $refName);
        if(isset($this->dto)) parent::mount($request);
    }

    /**
     * Live DTO CLASS
     * @return void
     */
    protected function liveData(string $_key, string $refName)
    {
        $data = baseTheme()->privateData('_' . $_key . '_' . $refName);
        
        if(! empty($data['dtoClass'])) {
            
            $dtoClass = $data['dtoClass'];
            if(! class_exists($dtoClass)) {
                throw new BaseThemeException(...defineError("Synthable class not found...!", __CLASS__, __LINE__, 10008));
            }

            $this->dtoClass = $data['dtoClass'];
            unset($data['dtoClass']);
            unset($data['isRendered']);

            $this->dto = $this->dataResult($data);

        }
    }

    /**
     * Data Result from Synthable
     */
    protected function dataResult(array $data = []): Synthable
    {
        return new $this->dtoClass(...$data);
    }
}