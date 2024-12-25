<?php

namespace HaschaMedia\BaseTheme\Support;

class Manager
{
    /**
     * Telusuri file PHP dalam direktori
     * @return array
     */
    public static function getFiles(string $directory, string $baseNamespace, string $separator = '') {
        $phpFiles = [];
    
        // Inisialisasi iterator rekursif
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory, \RecursiveDirectoryIterator::SKIP_DOTS)
        );
    
        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $namespace = static::getNamespace($file->getPathname(), $baseNamespace, $separator);
                $className = static::getClassName($file->getPathname());
    
                if ($namespace && $className) {
                    $phpFiles[] = [
                        'file' => $file->getPathname(),
                        'namespace' => $namespace,
                        'componentClass' => $className,
                        'kebab' => static::kebabFormat($file->getPathname(), $className, $separator),
                    ];
                }
            }
        }
    
        return $phpFiles;
    }
    
    /**
     * Dapatkan namespace dari kelas (PHP) berdasarkan file dalam direktori
     * @return string
     */
    public static function getNamespace(string $filePath, string $baseNamespace, string $separator = '') {
        $explode = explode($separator, str_replace('\\', '/', $filePath));

        $namespace = str_replace('/', '\\', $explode[1]);
        $namespace = str_replace('.php', '', $namespace);
        $namespaceResult = $baseNamespace.$namespace;
    
        return $namespaceResult;
    }
    
    /**
     * Dapatkan nama kelas (PHP) berdasarkan file dalam suatu direktori
     * @return string
     */
    public static function getClassName(string $filePath) {
        $className = null;
    
        if (file_exists($filePath)) {
            $fileContent = file_get_contents($filePath);
    
            if (preg_match('/class\s+(\w+)/', $fileContent, $matches)) {
                $className = trim($matches[1]);
            }
        }
    
        return $className;
    }

    /**
     * Konversikan nama file menjadi kebab format
     * @return string
     */
    public static function kebabFormat(string $filePath, string $className, string $separator = '') {
        $explode = explode($separator, str_replace('\\', '/', $filePath));

        $kebab = str_replace('/', '#', $explode[1]);
        $kebab = str_replace('.php', '', $kebab);

        $kebabExplode= explode('#', $kebab);
        $kebabFormat = null;

        foreach($kebabExplode as $_key => $i) {
            $kebabFormat .= \Illuminate\Support\Str::kebab($i);
            if(! empty($kebabFormat) && $_key < 1 && count($kebabExplode) > 1) {
                $kebabFormat .= ".";
            }
        }
    
        return $kebabFormat;
    }
}