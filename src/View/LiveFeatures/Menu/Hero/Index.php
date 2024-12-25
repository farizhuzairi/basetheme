<?php

namespace Hascha\BaseTheme\View\LiveFeatures\Menu\Hero;

use Livewire\Attributes\On;
use Livewire\Attributes\Isolate;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Livewire\Synth\UseAdditonalSynth;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Builder\Component\BaseLiveComponent;

#[Isolate]
class Index extends BaseLiveComponent implements Componentable
{
    use Explained, UseAdditonalSynth;
    
    public ?string $typeOf = null;

    public function baseComponent(): string
    {
        return "base::live-features.menu.hero.";
    }
    
    /**
     * Start the function that must be preceded
     * @return void
     */
    protected function run()
    {
        $this->__setBase($this->typeOf, function($blade) {
            return empty($blade) ? "index" : $blade;
        });
    }

    /**
     * ----------------------------------------
     * Hero attributes for component rendering
     * ----------------------------------------
     */
    public bool $renderListener = false;

    /**
     * Has Permission for Hero Rendering Listener
     * @return bool
     */
    protected function permission()
    {
        return $this->renderListener;
    }

    /**
     * Listener
     * @return void
     */
    #[On('menu-hero')]
    public function toRender(?string $name = "", ?string $dtoClass = "", ?string $title = null)
    {
        if(! empty($name) && ! empty($dtoClass)) {

            $isNotMatch = $this->dtoName !== $name;
            $isDto = false;

            if($isNotMatch || ! $isNotMatch && ! $this->dto) {
                $this->reset();
                $dtoClass = str_replace('.', '\\', $dtoClass);
                $isDto = $this->addSynth($name, $dtoClass, ['title' => $title]);
            }
            
            if($isDto) {
                $this->renderListener = ! $this->renderListener ? true : $isNotMatch;
            }
            else{
                $this->renderListener = false;
                $this->resetSynth();
            }

        }
        else {

            $this->renderListener = false;
            $this->resetSynth();

        }

        $this->setup(baseTheme());
    }

    /**
     * Close Menu
     * @return void
     */
    public function close()
    {
        $this->toRender();
    }
}