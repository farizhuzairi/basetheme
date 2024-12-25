<?php

namespace HaschaMedia\BaseTheme\Services;

use Hascamp\BaseCrypt\Encryption\BaseCrypt;
use Illuminate\Support\Facades\Config as LaravelConfig;

final class Configuration
{
    private string $config;
    private static string $key;

    public function __construct(array $config)
    {
        $this->setKey();
        $this->config = BaseCrypt::code($config, static::$key);
        LaravelConfig::set('basetheme', []);
    }

    private function setKey(): void
    {
        static::$key = csrf_token();
    }

    public function getConfig(array|string|null $key = null, array|null $arrKeys = null): mixed
    {
        $result = null;
        $config = $this->config;

        if(!empty($key)) {

            $config = BaseCrypt::code($config, static::$key, 'decrypt');

            if(array_key_exists($key, $config)) {
                $result = $config[$key];

                if(is_array($result) && ! empty($arrKeys)) {
                    foreach($arrKeys as $i) {
                        $result = array_key_exists($i, $result) ? $result[$i] : [];
                    }
                }
            }

        }

        return $result;
    }
}