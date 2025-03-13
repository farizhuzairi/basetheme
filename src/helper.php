<?php

use Illuminate\Support\Str;
use Hascha\BaseTheme\Services\ThemeConfig;
use Hascha\BaseTheme\Contracts\Explainable;
use Hascha\BaseTheme\Services\ThemeService;

if(! function_exists('defineError')){

    function defineError(
        string $message,
        string $class,
        string $line,
        int $code = 0,
        bool $isReported = true
    ) {

        return [
            "message" => $message,
            "code" => $code,
            "isReported" => $isReported,
            "error" => [
                "class" => $class,
                "line" => $line,
            ],
        ];

    }

}

if(! function_exists('themeConfig')){

    function themeConfig() {
        return app(ThemeConfig::class);
    }

}

if(! function_exists('baseTheme')){

    function baseTheme() {

        return app(ThemeService::class);

    }

}

if(! function_exists('explain')){

    function explain() {

        return app(Explainable::class);

    }

}

if(! function_exists('liveKey')){

    function liveKey(?string $key, ?string $prefix = null) {

        if(empty($key)) {
            $key = 'empty';
        }

        return $prefix . Str::slug($key);

    }

}