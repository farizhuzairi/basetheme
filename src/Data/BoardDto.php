<?php

namespace HaschaMedia\BaseTheme\Data;

use HaschaMedia\BaseTheme\Traits\Dto\HasWirePoll;

abstract class BoardDto
{
    use HasWirePoll;
    
    public ?string $spaces = null;
    public array $lists = [];

    public $toClass;

    public function __construct(
        ?string $spaces = "3",
        array $lists = []
    )
    {
        if(empty($lists)) {
            $results = $this->construction();
            $spaces = $results['spaces'] ?? $spaces;
            $lists = $results['lists'] ?? $lists;
        }

        $this->spaces = $spaces;
        $this->lists = $lists;

        $_spaces = function($spaces) {
            $css = "gap-";
            if(empty($spaces)) {
                return $css . "5";
            }
            return $css . $spaces;
        };

        $this->spaces = $_spaces($spaces);
    }

    /**
     * Create New Data Results
     * @return array
     */
    abstract public function construction();

    /**
     * Implement to define an object or property
     * @return array
     */
    public static function properties()
    {
        return [
            'spaces',
            'lists'
        ];
    }

    /**
     * With auto update.
     * 'Override' for use auto update.
     * @return int|null
     */
    public function withPoll()
    {
        return 0;
    }
}