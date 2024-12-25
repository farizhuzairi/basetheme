<?php

namespace Hascha\BaseTheme\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Hascha\BaseTheme\Console\BaseCommand;

class PublishBaseThemeAssets extends BaseCommand
{
    protected $signature = 'basetheme:publish-assets';
    protected $description = 'Publikasikan aset tema dasar';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if($this->isNotRun()) {
            $this->error('Package BaseTheme tidak digunakan dalam mode development.');
            return Command::FAILURE;
        }

        $this->info('Menjalankan vendor:publish...');
        $exitCode = Artisan::call('vendor:publish', ['--tag' => 'basetheme-assets']);
        $exitCodeAdd = Artisan::call('basetheme:webmanifest');
        
        if ($exitCode === 0 && $exitCodeAdd === 0) {
            $this->info('BaseTheme Assets berhasil dipublikasikan.');
        } else {
            $this->error('Gagal mempublikasikan aset BaseTheme Assets.');
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }
}
