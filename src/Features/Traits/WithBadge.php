<?php

namespace Hascha\BaseTheme\Features\Traits;

use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Contracts\Component\FeatureableComponent;

trait WithBadge
{
    protected ?string $badge = null;
    protected string $typeOfBadge = 'text'; // text

    protected function useBadgeInformation(): array
    {
        return [
            'badge' => $this->badge,
            'typeOf' => $this->typeOfBadge
        ];
    }

    public function badge(string $badge, string $typeOf = 'text')
    {
        $this->badge = (string) $badge;
        $this->typeOfBadge = (string) $typeOf;
        return $this;
    }
}