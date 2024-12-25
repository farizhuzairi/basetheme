<?php

namespace HaschaMedia\BaseTheme\Contracts\Factory;

interface Html
{
    /**
     * @param \HaschaMedia\BaseTheme\Contracts\Element\Elementable|\HaschaMedia\BaseTheme\Contracts\Component\Componentable $html
     * @return static
     */
    public function set($html);
}