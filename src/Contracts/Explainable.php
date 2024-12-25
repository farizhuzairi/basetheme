<?php

namespace Hascha\BaseTheme\Contracts;

use Hascha\BaseTheme\Services\ThemeService;

interface Explainable
{
    public function __construct(ThemeService $service);
    public function instance(): Explainable;
    public function __call(string $name, mixed $args);
}