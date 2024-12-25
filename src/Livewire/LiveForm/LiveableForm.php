<?php

namespace HaschaMedia\BaseTheme\Livewire\LiveForm;

use HaschaMedia\BaseTheme\Livewire\LiveForm\LiveableFormComponent;

interface LiveableForm
{
    /**
     * Set Data Modelable or Other Data Models,
     * return type \Illuminate\Support\Collection or object.
     * @return object
     */
    public function setForm(object|array $dataModel);

    /**
     * 'Override' for form processing:
     * Submit form.
     * @param array $validated
     * @param \HaschaMedia\BaseTheme\Livewire\LiveForm\LiveableFormComponent $baseForm
     * @return \Closure|\Illuminate\Http\Response|bool|null
     */
    public function handle(array $validated, LiveableFormComponent $baseForm);
}