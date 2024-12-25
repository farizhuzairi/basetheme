<?php

namespace HaschaMedia\BaseTheme\Console;

use Illuminate\Console\Command;

class BaseCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function isNotRun(): bool
    {
        return empty(config("app.name", null)) ? true : false;
    }
}
