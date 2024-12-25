<?php

namespace Hascha\BaseTheme\Traits;

trait AltKey
{
    /**
     * Membuat kunci variabel alternative
     * @return string
     */
    public function alt_key(string $key)
    {
        return "alt_" . $key;
    }
}