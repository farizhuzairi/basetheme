<?php

namespace Hascha\BaseTheme\Components\Features\Headline;

use Illuminate\Support\Collection;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Features\Traits\Featureable;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;
use Hascha\BaseTheme\Features\Traits\FeatureableContent;
use Hascha\BaseTheme\Features\Traits\FeatureableSubject;
use Hascha\BaseTheme\Traits\Components\SetViewComponent;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

class Headline extends BaseComponent implements Componentable, FeatureableComponent
{
    use Explained,
    Featureable,
    FeatureableSubject,
    SetViewComponent,
    FeatureableContent;

    // Data Objects
    protected array $properties = [];
    protected array $buttons = [];
    
    protected function construction(ThemeService $service)
    {
        $this->typeOfBiggest();
    }

    /**
     * set view component default
     * @return string
     */
    protected function setViewComponentDefault()
    {
        return "side";
    }

    /**
     * type of counter
     * @return static
     */
    public function typeOfSide()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * type of counter
     * @return static
     */
    public function typeOfBiggest()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    /**
     * type of header
     * @return static
     */
    public function typeOfHeader()
    {
        $this->setAsViewComponent(__FUNCTION__);
        return $this;
    }

    public function baseComponent(): string
    {
        return "base::basetheme.features.headline.";
    }

    /**
     * Features
     * @return array
     */
    protected function features(array $data = [])
    {
        return array_merge($this->properties, [
            'buttons' => $this->buttons,
        ]);
    }

    /**
     * Button components
     * @return static
     */
    public function button(string $text, string $url, bool $isMain = false)
    {
        $this->buttons[] = [
            'text' => $text,
            'url' => $url,
            'main' => $isMain,
        ];
        return $this;
    }

    /**
     * Default Headline
     * @return static
     */
    public function setDefault(?string $url = null)
    {
        if($this->typeOf === 'header') {
            $this->subject(baseTheme()->pageTitle());
            $this->properties['url'] = $url;
        }

        return $this;
    }

    /**
     * Set Url
     * @return static
     */
    public function url(string $url)
    {
        $this->properties['url'] = $url;
        return $this;
    }

    /**
     * Super Text Headline
     * @return static
     */
    public function extra(
        string $headTitle,
        ?string $headUrl = null,
        ?string $headLogo = null,
        bool $withIcon = false
    )
    {
        $this->properties['headTitle'] = $headTitle;
        $this->properties['headLogo'] = $withIcon ? null : $headLogo;
        $this->properties['headIcon'] = $withIcon ? $headLogo : null;
        $this->properties['headUrl'] = $headUrl;
        $this->properties['showLogo'] = $withIcon ? false : true;
        $this->properties['withIcon'] = $withIcon;
        return $this;
    }
}