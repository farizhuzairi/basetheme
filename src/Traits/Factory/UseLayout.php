<?php

namespace Hascha\BaseTheme\Traits\Factory;

use Hascha\BaseTheme\Exceptions\BaseThemeException;

trait UseLayout
{
    public const LAYOUT = "layout";

    /**
     * @var string
     */
    protected static $layoutDirectory = "\\Hascha\\BaseTheme\\Components\\Layout\\";

    /**
     * @return string|null
     */
    public function useLayout(?string $layout = null)
    {
        if(empty($layout)) $layout = themeConfig()->defaultLayout();

        $class = static::$layoutDirectory . ucwords($layout);
        if(! class_exists($class)) {
            throw new BaseThemeException(...defineError("{$class} Layout Class is not available.", __CLASS__, __LINE__, 0));
        }

        return $class;
    }
}