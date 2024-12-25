<?php

namespace Hascha\BaseTheme\Contracts\Factory;

interface Html
{
    /**
     * @param \Hascha\BaseTheme\Contracts\Element\Elementable|\Hascha\BaseTheme\Contracts\Component\Componentable $html
     * @return static
     */
    public function set($html);
}