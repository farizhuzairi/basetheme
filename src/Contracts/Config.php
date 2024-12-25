<?php

namespace HaschaMedia\BaseTheme\Contracts;

interface Config
{
    public function getConfig(array|string|null $key = null): mixed;
}