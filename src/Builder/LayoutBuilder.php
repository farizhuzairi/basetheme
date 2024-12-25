<?php

namespace Hascha\BaseTheme\Builder;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;
use Hascha\BaseTheme\Contracts\Builder;
use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Traits\HasLiveDataKey;
use Hascha\BaseTheme\Traits\Factory\UseTheme;
use Hascha\BaseTheme\Traits\Factory\UseLayout;
use Hascha\BaseTheme\Contracts\Theme\Themeable;
use Hascha\BaseTheme\Contracts\Layout\Layoutable;
use Hascha\BaseTheme\Contracts\Element\Elementable;
use Hascha\BaseTheme\Exceptions\BaseThemeException;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

final class LayoutBuilder implements Builder, Layouting
{
    use UseLayout, UseTheme, HasLiveDataKey;

    /**
     * Menyimpan data Instance Views berdasarkan nama kunci.
     * @var \Illuminate\Contracts\View\View[]
     */
    private static $views = [];

    /**
     * Menyimpan data Html Element berdasarkan nama kunci.
     * @var \Illuminate\Contracts\View\View[]
     */
    private static $elements = [];

    public function getView(string $name): View
    {
        $views = static::$views;
        if(! array_key_exists($name, $views)) {
            throw new BaseThemeException(...defineError("Cannot instance view builder.", __CLASS__, __LINE__, 10001));
        }

        return $views[$name];
    }

    public function views(): array
    {
        return static::$views;
    }

    public function hasView(string $name): bool
    {
        return array_key_exists($name, static::$views) ? true : false;
    }

    public function getElement(string $name): View
    {
        $views = static::$views;
        if(! array_key_exists($name, $views)) {
            throw new BaseThemeException(...defineError("Cannot instance html element (builder).", __CLASS__, __LINE__, 10001));
        }

        return $views[$name];
    }

    public function elements(): array
    {
        return static::$elements;
    }

    public function hasElement(string $name): bool
    {
        return array_key_exists($name, static::$elements) ? true : false;
    }

    /**
     * LAYOUT VIEW
     */
    public function visitNewLayout(Layoutable $layout): void
    {
        $themeConfig = themeConfig();

        $pageTitle = $layout->getTitle();
        if(! empty($pageTitle)) {
            $pageTitle = $pageTitle . " | " . $themeConfig->brandName();
        }
        else{
            $pageTitle = $themeConfig->brandName();
        }

        $layout = $layout->resolveView();
        if($layout instanceof View) {
            $layout->with('__manifest', $themeConfig->defaultManifest());
            $layout->with('__title', $pageTitle);
            $layout->with('__css', $themeConfig->defaultCss());
            $layout->with('__js', $themeConfig->defaultJs());
            $layout->with($themeConfig->layoutVariable(), null);
        }

        static::$views[static::LAYOUT] = $layout;
    }

    /**
     * THEME VIEW
     */
    public function visitTheme(Themeable $theme): void
    {
        $theme = $theme->addDataCompact('attributes', new ComponentAttributeBag())->resolveView();
        if($theme instanceof View) {
            $theme->with('__content', []);
        }

        static::$views[static::THEME] = $theme;
    }

    /**
     * HTML ELEMENTS [VIEW]
     */
    public function visitElement(Elementable $element, string $key): void
    {
        $element->addDataCompact('attributes', new ComponentAttributeBag());
        $element = $element->resolveView();
        if($element instanceof View) {
            $element->with('theme', $this->useTheme('theme', baseTheme()->getAttribute('theme')));
        }

        static::$elements[$key] = $element;
    }

    /**
     * FEATUREABLE COMPONENTS [VIEW]
     */
    public function visitComponent(FeatureableComponent $component): ?FeatureableComponent
    {
        if($component instanceof FeatureableComponent) {
            $component->addDataCompact('attributes', new ComponentAttributeBag());

            // Live Data
            $component->buildUp();
            $key = "_" . $component->__getKey() . "_" . $component->__getClassName();
            explain()->{$key}()->data($component->__getProps());

            return $component;
        }

        return null;
    }
}