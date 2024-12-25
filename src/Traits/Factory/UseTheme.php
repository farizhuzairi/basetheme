<?php

namespace Hascha\BaseTheme\Traits\Factory;

use Hascha\BaseTheme\Exceptions\BaseThemeException;

trait UseTheme
{
    public const THEME = "theme";

    /**
     * @var string
     */
    protected static $themeDirectory = "\\Hascha\\BaseTheme\\Components\\Theme\\";

    /**
     * @return array|string|null
     */
    public function useTheme(?string $get = null, ?string $theme = null)
    {
        if(empty($theme)) $theme = themeConfig()->defaultThemeModel();

        $__theme = explode("::", $theme);

        if(empty($get) && is_array($__theme)) {
            return $__theme;
        }

        elseif($get === "class" && isset($__theme[0])) {
            $class = static::$themeDirectory . ucwords($__theme[0]);
            if(! class_exists($class)) {
                throw new BaseThemeException(...defineError("{$class} Theme Model Class is not available.", __CLASS__, __LINE__, 0));
            }
            return $class;
        }

        elseif($get === "theme" && isset($__theme[1])) {
            return strtolower($__theme[1]);
        }

        else{
            return null;
        }
    }
}