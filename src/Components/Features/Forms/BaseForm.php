<?php

namespace Hascha\BaseTheme\Components\Features\Forms;

use Closure;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableContent;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class BaseForm extends BaseComponent implements Componentable, FeatureableComponent
{
    use
    Featureable,
    FeatureableSubject,
    SetViewComponent,
    FeatureableContent;

    // Data Objects
    protected array $properties = [];

    // Form Attributes
    protected string $name;
    protected string $method;
    protected string $dto;
    protected array $forms = [];
    protected array $values = [];

    // Optional Attributes
    protected ?string $placeholder = null;
    protected ?string $label = null;

    protected function construction(ThemeService $service)
    {
        $this->typeOfBase();
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.forms.";
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "base";
    }

    /**
     * type of counter
     * @return static
     */
    public function typeOfBase()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return array_merge($this->properties, [
            'name' => $this->name,
            'method' => $this->method ?? 'POST',
            'dto' => $this->dto,
            'values' => $this->values,
            'forms' => $this->forms,
        ]);
    }

    /**
     * @return array
     */
    protected function dataFormAttribute(
        string $form,
        string $name,
        string $type,
    )
    {
        return [
            'form' => $form,
            'name' => $name,
            'type' => $type,
        ];
    }

    /**
     * Set Form Name
     * @return static
     */
    public function name(string $name, string $dtoClass)
    {
        $this->name = str_replace(" ", "", $name);
        $this->dto = $dtoClass;
        return $this;
    }

    /**
     * Set Form Method
     * @return static
     */
    public function method(string $method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Set Form Attribute: Input
     * @return static
     */
    public function formInput(
        string $name,
        Closure|string $type = 'text',
        ?Closure $form = null
    )
    {
        $name = str_replace(" ", "", $name);

        if($type instanceof Closure) {
            $form = $type;
            $type = 'text';
        }

        if($form instanceof Closure) {
            $form($this);
        }

        $this->forms[$name] = array_merge(
            $this->dataFormAttribute(
                'base::form.input',
                $name,
                $type,
            ),
            [
                'placeholder' => $this->placeholder,
                'label' => $this->label,
            ]
        );

        $this->values[] = $name;

        $this->reset();
        return $this;
    }

    /**
     * Set Form Submit
     * @return static
     */
    public function submit(
        string $label,
        string $name = null,
        string $type = 'submit'
    )
    {
        $name = ! empty($name) ? str_replace(" ", "", $name) : 'submit';
        $this->label = $label;

        $this->forms[$name] = array_merge(
            $this->dataFormAttribute(
                'base::form.submit',
                $name,
                $type,
            ),
            [
                'label' => $this->label,
            ]
        );

        return $this;
    }

    /**
     * Set Placeholder
     * @return static
     */
    public function placeholder(string $text)
    {
        $this->placeholder = $text;
        return $this;
    }

    /**
     * Set Label
     * @return static
     */
    public function label(string $text)
    {
        $this->label = $text;
        return $this;
    }

    /**
     * Reset Form Sub Data
     * @return void
     */
    public function reset()
    {
        $this->label = null;
        $this->placeholder = null;
    }
}