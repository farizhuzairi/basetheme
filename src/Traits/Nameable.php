<?php

namespace HaschaMedia\BaseTheme\Traits;

trait Nameable
{
    /**
     * Menghasilkan nama kelas utama yang diinisiasi.
     * Selain digunakan sebagai nama komponen bawaan, __getClassName() method digunakan juga sebagai dasar nama komponen bawaan yang dimodifikasi di dalam __base() method.
     * @return string
     */
    public function __getClassName()
    {
        $name = basename(str_replace('\\', '/', get_class($this)));
        return lcfirst($name);
    }
}