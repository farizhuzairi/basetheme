<?php

namespace HaschaMedia\BaseTheme\View\BaseLiveComponent\Forms;

use Illuminate\Http\Request;
use HaschaMedia\BaseTheme\Livewire\LiveForm\LiveableForm;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Builder\Component\BaseLiveComponent;
use HaschaMedia\BaseTheme\Livewire\LiveForm\LiveableFormComponent;

class Base extends BaseLiveComponent implements Componentable, LiveableFormComponent
{
    public LiveableForm $form;

    /**
     * Form Attributes
     */
    public string $name;
    public string $method;

    /**
     * Livewire construction method
     * @return void
     */
    public function mount(
        Request $request,
        ?string $dto = null,
        array $forms = [],
        array $values = []
    )
    {
        if(class_exists($dto)) {
            $this->form = new $dto($this, 'form');
            $this->form->setForm($forms);
            $this->form->setValues($values);
        }
    }

    /**
     * @return void
     */
    public function updated($key, $value)
    {
        $ex = explode('.', $key);
        $method = $ex[1];

        if(method_exists($this->form, $method)) {
            $this->form->{$method}($value);
        }
    }

    /**
     * @return void
     */
    public function submit()
    {
        $validated = $this->validate();
        $handle = $this->form->handle($validated, $this);

        if(! $handle || empty($handle)) {
            // error handle ...
        }
    }

    public function baseComponent(): string
    {
        return "base::livewire.forms.";
    }
}