<?php

namespace Hascha\BaseTheme\Components\Features;

use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Tagables extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable;
    
    /**
     * Data Tags
     * @var array
     */
    protected array $tags = [];

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return [
            'tags' => $this->tags,
        ];
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.";
    }

    /**
     * @return static
     */
    public function tagLink(array|string $text, string $url, ?string $icon = 'hascha-tag-style')
    {
        $this->tags[] = [
            'typeOf' => 'link',
            'text' => $text,
            'url' => $url,
            'icon' => $icon,
        ];
        return $this;
    }

    /**
     * @return static
     */
    public function tagText(array|string $text, ?string $icon = 'hascha-horizontal_rule')
    {
        $this->tags[] = [
            'typeOf' => 'text',
            'text' => $text,
            'icon' => $icon,
        ];
        return $this;
    }
}