<?php

namespace Hascha\BaseTheme\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Hascha\BaseTheme\Console\BaseCommand;

class BaseThemeAssetClean extends BaseCommand
{
    protected $signature = 'basetheme:clean-assets';

    protected $description = 'Menghapus aset basetheme dalam folder public.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $publicPath = public_path();
        $foldersToDelete = ['basetheme', 'build', 'icons', 'images/base-layout', 'images/bg'];

        foreach ($foldersToDelete as $folder) {
            $folderPath = $publicPath . DIRECTORY_SEPARATOR . $folder;

            if (File::isDirectory($folderPath)) {
                $del = $this->deleteAll($folderPath);
                File::deleteDirectory($folderPath);
                $this->info("Folder '{$folder}' telah dihapus.");
            } else {
                $this->info("Folder '{$folder}' tidak ditemukan.");
                return Command::FAILURE;
            }
        }
        return Command::SUCCESS;
    }

    protected function deleteAll($directory)
    {
        if (File::isDirectory($directory)) {
            $files = File::allFiles($directory);
            $directories = File::directories($directory);

            foreach ($files as $file) {
                File::delete($file);
            }

            foreach ($directories as $dir) {
                $this->deleteAll($dir);
                File::deleteDirectory($dir);
            }
        }
    }
}
