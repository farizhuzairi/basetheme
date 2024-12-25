<?php

namespace Hascha\BaseTheme\Facade\Features;

use Illuminate\Support\Facades\Facade;
use Hascha\BaseTheme\Features\ContentService;

class Content extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return ContentService::class;
    }
}