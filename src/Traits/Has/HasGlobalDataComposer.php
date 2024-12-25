<?php

namespace Hascha\BaseTheme\Traits\Has;

trait HasGlobalDataComposer
{
    /**
     * Membuat standar kunci variabel
     * @return string
     */
    private function global_key(string $key)
    {
        return "__{$key}";
    }
}