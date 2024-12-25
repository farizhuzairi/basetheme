<?php

namespace Hascha\BaseTheme\Facade;

use Illuminate\Support\Facades\Facade;
use Hascha\BaseTheme\Contracts\Explainable;

class Explain extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return Explainable::class;
    }
}