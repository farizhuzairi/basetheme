<?php

namespace Hascha\BaseTheme\Livewire;

use Livewire\Form;
use Illuminate\Support\Collection;
use Hascha\BaseTheme\Livewire\LiveForm\LiveableFormComponent;

abstract class LiveForm extends Form
{
    // /**
    //  * Data Model Object
    //  * @var \Illuminate\Support\Collection|object
    //  */
    // protected $dataModel;

    // /**
    //  * Set Data Modelable or Other Data Models
    //  * @return mixed
    //  */
    // final public function setDataModel(object|array $dataModel)
    // {
    //     $this->dataModel = $this->dataModel($dataModel);
    // }

    // /**
    //  * Defining the data model
    //  * @return object|array|null
    //  */
    // protected function dataModel(object|array $dataModel)
    // {
    //     if(is_object($dataModel)) {
    //         return $dataModel;
    //     }

    //     return collect($dataModel);
    // }

    /**
     * Form Object
     * @var object|array
     */
    protected $form;

    /**
     * Form Object
     * @var \Illuminate\Support\Collection|array
     */
    public $attributes;

    /**
     * Set Data Modelable or Other Data Models,
     * return type \Illuminate\Support\Collection or object.
     * @return void
     */
    public function setForm(object|array $dataModel)
    {
        if ($form instanceof Collection) {
            $this->form = (object) ($form->toArray());
        }

        elseif (is_object($form)) {
            $this->form = $form;
        }

        else {
            $this->form = (object) $form;
        }
    }

    /**
     * Set Value Form Attributes,
     * @return void
     */
    public function setValues(array $attributes)
    {
        foreach($attributes as $key => $value) {

            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }

        }
    }

    /**
     * Performs object or property validation.
     * @return array
     */
    final public function rules()
    {
        return $this->validationWithRules();
    }

    /**
     * Defines object data or properties that must be validated manually.
     * @return array
     */
    abstract protected function validationWithRules();

    /**
     * 'Override' for form processing:
     * Submit form.
     * @param array $validated
     * @param \Hascha\BaseTheme\Livewire\LiveForm\LiveableFormComponent $baseForm
     * @return \Closure|\Illuminate\Http\Response|bool|null
     */
    public function handle(array $validated, LiveableFormComponent $baseForm)
    {
        return true;
    }

    /**
     * 'Override' to generate redirect url after form data is successfully executed
     * @return string|null
     */
    public function withRedirect()
    {
        return null;
    }

    /**
     * 'Override' for form processing:
     * Store data.
     * @return \Closure|\Illuminate\Http\Response|null
     */
    public function store()
    {
        return null;
    }

    /**
     * 'Override' for form processing:
     * Update data
     * @return \Closure|\Illuminate\Http\Response|null
     */
    public function update()
    {
        return null;
    }

    /**
     * 'Override' for form processing:
     * Delete data
     * @return \Closure|\Illuminate\Http\Response|null
     */
    public function delete()
    {
        return null;
    }

    /**
     * 'Override' for form processing:
     * Force Delete data
     * @return \Closure|\Illuminate\Http\Response|null
     */
    public function forceDelete()
    {
        return null;
    }
}