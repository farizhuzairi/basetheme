<?php

namespace HaschaMedia\BaseTheme\Features\Traits;

trait FeatureableEmptyList
{
    protected string $emptyText = "";

    /**
     * data list
     * @return @static
     */
    public function empty(string $text)
    {
        $this->emptyText = $text;
        return $this;
    }
}