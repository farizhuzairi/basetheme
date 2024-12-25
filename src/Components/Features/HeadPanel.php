<?php

namespace Hascha\BaseTheme\Components\Features;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

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