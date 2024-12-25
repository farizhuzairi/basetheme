<?php

namespace HaschaMedia\BaseTheme\Components\Features\List;

use Closure;
use Illuminate\Support\Collection;
use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Services\ThemeService;
use HaschaMedia\BaseTheme\Features\Traits\Featureable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableContent;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableSubject;
use HaschaMedia\BaseTheme\Traits\Components\SetViewComponent;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableEmptyList;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

class Gridable extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    FeatureableContent,
    FeatureableEmptyList,
    SetViewComponent;

    // List Objects
    public Collection $lists;
    protected array $buttons = [];
    protected array $details = [];

    // view component
    protected ?string $bladeComponent = null;

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'lists' => $this->lists,
            'emptyText' => $this->emptyText,
        ];
    }

    public function __construct(
        protected ?string $subject = null,
        protected ?string $introduction = null,
    )
    {
        parent::__construct(
            subject: $subject,
            introduction: $introduction
        );
    }

    // last key
    public string|int $lastKey;

    /**
     * data list
     * @return @static
     */
    public function list(string $title, ?string $subTitle, Closure $list)
    {
        if(! empty($title)) {

            $this->lastKey = \Illuminate\Support\Str::slug($title);
            $list($this);

            $this->lists = $this->lists->put($this->lastKey, [
                'title' => $title,
                'subTitle' => $subTitle,
                'buttons' => $this->buttons,
                'details' => $this->details,
            ]);

            $this->buttons = [];
            $this->details = [];
            unset($this->lastKey);
        }

        return $this;
    }

    // add button
    public function button(string $text, string $url, ?string $icon = 'hascha-trending_neutral'): static
    {
        $this->buttons[] = [
            'text' => $text,
            'url' => $url,
            'icon' => $icon,
        ];

        return $this;
    }

    // add details
    public function details(array $flags, ?string $description = null): static
    {
        $this->details = [
            'flags' => $flags,
            'description' => $description,
        ];

        return $this;
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "order-list";
    }

    /**
     * type of order
     * @return static
     */
    public function typeOfOrderList()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }
    
    protected function construction(ThemeService $service)
    {
        $this->typeOfOrderList();
        $this->lists = collect([]);
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.gridable.";
    }
}