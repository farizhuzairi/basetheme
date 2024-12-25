<?php

namespace HaschaMedia\BaseTheme\Facade\Features;

use Illuminate\Support\Facades\Facade;
use HaschaMedia\BaseTheme\Features\ContentService;

class Content extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return ContentService::class;
    }
}