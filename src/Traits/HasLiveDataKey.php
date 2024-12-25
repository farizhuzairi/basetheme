<?php

namespace HaschaMedia\BaseTheme\Traits;

trait HasLiveDataKey
{
    /**
     * Use live data key
     * @return string
     */
    protected function liveDataKey(?string $key, ?string $ref)
    {
        return "_{$key}_{$ref}";
    }
}