<?php

namespace HaschaMedia\BaseTheme\Facade;

use Illuminate\Support\Facades\Facade;
use HaschaMedia\BaseTheme\Contracts\Explainable;

class Explain extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return Explainable::class;
    }
}