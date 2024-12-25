<?php

namespace Hascha\BaseTheme\Features;

use Hascha\BaseTheme\Features\Abstract\Compilable;
use Hascha\BaseTheme\Features\Abstract\CompilableService;
use Hascha\BaseTheme\Features\Traits\FeatureableConstruct;

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