<?php

namespace HaschaMedia\BaseTheme\Contracts\Component;

interface Slotable
{
    /**
     * Defines an alternative variable if the "slot" is not found or not used.
     * @return array
     */
    public function altContent(mixed $data);
}