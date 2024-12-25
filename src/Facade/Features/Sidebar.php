<?php

namespace Hascha\BaseTheme\Facade\Features;

use Illuminate\Support\Facades\Facade;
use Hascha\BaseTheme\Features\SidebarService;

class Sidebar extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return SidebarService::class;
    }
}