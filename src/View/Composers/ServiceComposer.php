<?php

namespace Hascha\BaseTheme\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Collection;

class ServiceComposer
{
    private static Collection $global;
    
    public function __construct()
    {
        static::$global = baseTheme()->globalComposer();
    }

    public function compose(View $view): void
    {
        if(! static::$global->isEmpty()) {

            foreach(static::$global as $_key => $_value) {
                $view->with($_key, $_value);
            }
            
        }
    }
}