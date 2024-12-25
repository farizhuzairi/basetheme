<?php

namespace HaschaMedia\BaseTheme\Features;

use HaschaMedia\BaseTheme\Features\Abstract\Compilable;
use HaschaMedia\BaseTheme\Features\Abstract\CompilableService;
use HaschaMedia\BaseTheme\Features\Traits\FeatureableConstruct;

class SidebarService extends CompilableService implements Compilable
{
    use FeatureableConstruct;

    /**
     * Service Name
     * @return string
     */
    protected function serviceName(): string
    {
        return 'sidebar';
    }
}