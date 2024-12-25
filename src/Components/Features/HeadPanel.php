<?php

namespace HaschaMedia\BaseTheme\Components\Features;

use HaschaMedia\BaseTheme\Traits\Explained;
use HaschaMedia\BaseTheme\Features\Traits\Featureable;
use HaschaMedia\BaseTheme\Builder\Component\BaseComponent;
use HaschaMedia\BaseTheme\Contracts\Component\Componentable;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableSubject;
use HaschaMedia\BaseTheme\Contracts\Component\FeatureableComponent;

class HeadPanel extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject;

    protected string $title;
    protected string $url = '#';

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'title' => $this->title ?? 'Dashboard Panel',
            'url' => $this->url,
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.";
    }

    /**
     * Set Title
     * @return static
     */
    public function title(string $title, string $url = '#')
    {
        $this->title = $title;
        $this->url = $url;
        return $this;
    }
}