<?php

namespace HaschaMedia\BaseTheme\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class BaseThemeException extends Exception
{
    protected bool $isReported;
    protected array $error;

    public function __construct(
        string $message = '',
        int $code = 0,
        bool $isReported = true,
        array $error = [],
    )
    {
        $this->isReported = $isReported;
        $this->error = $error;
        $message = "Error: {$message}" . ($code > 0 ? " #{$code}" : "");
        parent::__construct($message, $code);
    }

    public function report(): bool
    {
        Log::error("{$this->getMessage()} #ErrCode:{$this->getCode()}.", $this->error);
        return $this->isReported;
    }
}
