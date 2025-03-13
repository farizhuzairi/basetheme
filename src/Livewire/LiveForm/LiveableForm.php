<?php

namespace Hascha\BaseTheme\Livewire\LiveForm;

use Hascha\BaseTheme\Livewire\LiveForm\LiveableFormComponent;

interface LiveableForm
{
    /**
     * Set Data Modelable or Other Data Models,
     * return type \Illuminate\Support\Collection or object.
     * @return object
     */
    public function setForm(object|array $data);

    /**
     * Set Value Form Attributes,
     * @return void
     */
    public function setValues(array $attributes);

    /**
     * 'Override' for form processing:
     * Submit form.
     * @param array $validated
     * @param \Hascha\BaseTheme\Livewire\LiveForm\LiveableFormComponent $baseForm
     * @return \Closure|\Illuminate\Http\Response|bool|null
     */
    public function handle(array $validated, LiveableFormComponent $baseForm);
}