<?php

namespace HaschaMedia\BaseTheme\Contracts\Component;

interface Componentable
{
    /**
     * Method default ini harus di-override jika memerlukan kustomisasi atau perubahan direktori dasar komponen yang akan diteruskan dan dirender.
     * @return string
     */
    public function baseComponent();
}