<?php

namespace Hascha\BaseTheme\Traits\Dto;

trait HasWirePoll
{
    /**
     * with poll
     * @return string
     */
    public function wirePoll()
    {
        $poll = $this->withPoll();
        if(is_int($poll)) {
            if($poll > 0 && $poll < 60) {
                $poll = 60;
            }
            return "wire:poll.{$poll}s";
        }

        return "";
    }
}