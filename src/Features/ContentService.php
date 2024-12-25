<?php

namespace HaschaMedia\BaseTheme\Features;

use HaschaMedia\BaseTheme\Features\Abstract\Compilable;
use HaschaMedia\BaseTheme\Features\Abstract\CompilableService;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableConstruct;

class ContentService extends CompilableService implements Compilable
{
    use FeatureableConstruct;

    /**
     * Service Name
     * @return string
     */
    protected function serviceName(): string
    {
        return 'content';
    }

    /**
     * Top Nav Activated
     * @return static
     */
    public function topNav(bool $isActive = true): static
    {
        explain()->topNav($isActive)->data();
        return $this;
    }

    /**
     * Sub Nav Activated
     * @return static
     */
    public function subNav(bool $isActive = true): static
    {
        explain()->subNav($isActive)->data();
        return $this;
    }
}