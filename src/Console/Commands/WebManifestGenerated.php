<?php

namespace Hascha\BaseTheme\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Hascha\BaseTheme\Console\BaseCommand;

class WebManifestGenerated extends BaseCommand
{
    protected $signature = 'basetheme:webmanifest';
    protected $description = 'Memperbarui file webmanifest.json';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if($this->isNotRun()) {
            $this->error('Package BaseTheme tidak dapat digunakan dalam mode development.');
            return Command::FAILURE;
        }

        $appName = config('app.name', 'BaseTheme App');
        $manifestPath = public_path('icons/site.webmanifest');

        $manifestContent = [
            "name" => $appName,
            "short_name" => $appName,
            "icons" => [
                [
                    "src" => "/icons/android-chrome-192x192.png",
                    "sizes" => "192x192",
                    "type" => "image/png"
                ],
                [
                    "src" => "/icons/android-chrome-512x512.png",
                    "sizes" => "512x512",
                    "type" => "image/png"
                ],
                [
                    "src" => "/icons/apple-touch-icon.png",
                    "sizes" => "180x180",
                    "type" => "image/png"
                ],
                [
                    "src" => "/icons/favicon-16x16.png",
                    "sizes" => "16x16",
                    "type" => "image/png"
                ],
                [
                    "src" => "/icons/favicon-32x32.png",
                    "sizes" => "32x32",
                    "type" => "image/png"
                ]
            ],
            "theme_color" => "#ffffff",
            "background_color" => "#ffffff",
            "display" => "standalone",
            "start_url" => "/",
            "scope" => "/"
        ];

        File::put($manifestPath, json_encode($manifestContent, JSON_PRETTY_PRINT));

        $this->info('Manifest file generated successfully with the app name: ' . $appName);
        return Command::SUCCESS;
    }
}
