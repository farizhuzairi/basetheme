<?php

namespace Hascha\BaseTheme\Traits;

trait Explained
{
    use \Hascha\BaseTheme\Traits\HasLiveDataKey;
    
    /**
     * Define keywords for each required variable.
     * @return array|string
     */
    protected function explain(?string $key = null, ?string $ref = null)
    {
        if(! empty($key)) {
            return $this->liveDataKey($key, $ref);
        }

        return $this->__getClassName();
    }
}