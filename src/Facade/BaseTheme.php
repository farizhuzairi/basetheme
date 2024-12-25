<?php

namespace HaschaMedia\BaseTheme\Facade;

use Illuminate\Support\Facades\Facade;
use HaschaMedia\BaseTheme\Services\ThemeService;

class BaseTheme extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return ThemeService::class;
    }
}