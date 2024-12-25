<?php

namespace Hascha\BaseTheme\Traits;

use Illuminate\Contracts\View\View;
use Hascha\BaseTheme\Factory\ThemeFactory;
use Hascha\BaseTheme\Traits\ThemeModelFactory;

trait ThemeModelable
{
    use ThemeModelFactory;

    /**
     * Layout Builder Instance
     * @var string
     */
    protected string $layout = "";
    
    /**
     * Html layout (base template)
     * @var \Illuminate\Contracts\View\View
     */
    private static View $view;

    /**
     * run modelable theme construct
     * @return static
     */
    final protected function modelable()
    {
        $this->setFactory(
            class: ThemeFactory::class,
            requirement: "requirements",
            requirementArguments: [
                "boots" => ["boot"],
                "requiredAttributes" => [
                    "layout" => themeConfig()->defaultLayout(),
                    "theme" => themeConfig()->defaultThemeModel(),
                    "alias" => \Illuminate\Support\Str::snake($this->__getClassName(), '-'),
                    "title" => themeConfig()->brandName(),
                ]
            ],
            rendered: function($rendered) {
                $rendered->layout();
                static::$view = $rendered->render();
            }
        );

        return $this;
    }
}