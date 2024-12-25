<?php

namespace Hascha\BaseTheme\Facade;

use Illuminate\Support\Facades\Facade;
use Hascha\BaseTheme\Services\ThemeService;

class BaseTheme extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return ThemeService::class;
    }
}