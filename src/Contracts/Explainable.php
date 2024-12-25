<?php

namespace HaschaMedia\BaseTheme\Contracts;

use HaschaMedia\BaseTheme\Services\ThemeService;

interface Explainable
{
    public function __construct(ThemeService $service);
    public function instance(): Explainable;
    public function __call(string $name, mixed $args);
}