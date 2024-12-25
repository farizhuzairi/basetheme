<?php

namespace HaschaMedia\BaseTheme\Facade\Features;

use Illuminate\Support\Facades\Facade;
use HaschaMedia\BaseTheme\Features\SidebarService;

class Sidebar extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return SidebarService::class;
    }
}