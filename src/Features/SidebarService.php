<?php

namespace Hascha\BaseTheme\Features;

use Hascha\BaseTheme\Features\Abstract\Compilable;
use Hascha\BaseTheme\Features\Abstract\CompilableService;
use Hascha\BaseTheme\Features\Traits\FeatureableConstruct;

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