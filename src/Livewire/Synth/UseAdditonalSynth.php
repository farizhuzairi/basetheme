<?php

namespace Hascha\BaseTheme\Livewire\Synth;

use Hascha\BaseTheme\Livewire\Synth\Synthable;
use Hascha\BaseTheme\Exceptions\BaseThemeException;

trait UseAdditonalSynth
{
    public ?Synthable $dto = null;
    public ?string $dtoName = null;
    public ?string $dtoClass = null;

    /**
     * Additional DTO CLASS
     * @return void
     */
    protected function addSynth(string $name, string $class, array $attributes = [])
    {
        if(class_exists($class)) {
            $this->dtoName = $name;
            $this->dtoClass = $class;
            $this->dto = $this->dataResult($attributes);
            return true;
        }
        else {
            throw new BaseThemeException(...defineError("Synthable class not found...!", __CLASS__, __LINE__, 10009));
        }

        return false;
    }

    /**
     * Data Result from Synthable
     */
    protected function dataResult(array $attributes = []): Synthable
    {
        $class = $this->dtoClass;
        return new $class(...$attributes);
    }

    /**
     * Reset DTO
     * @return void
     */
    protected function resetSynth(): void
    {
        $this->dto = null;
        $this->dtoName = null;
        $this->dtoClass = null;
    }
}