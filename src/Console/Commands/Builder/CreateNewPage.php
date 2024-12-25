<?php

namespace HaschaMedia\BaseTheme\Console\Commands\Builder;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateNewPage extends Command
{
    protected $signature = 'basetheme:model {className}';
    protected $description = 'Publikasikan aset tema dasar';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $className = Str::replace(" ", "", ucfirst($this->argument('className')));
        $directory = app_path('Themes');
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // $stubPath = __DIR__.'/../../../stubs/basetheme-model.stub';
        $stubPath = base_path('vendor/haschamedia/basetheme/stubs/basetheme-model.stub');
        if (!$stubPath || !File::exists($stubPath)) {
            $this->error("Stub file does not exist at path $stubPath.");
            return;
        }

        $stubContent = File::get($stubPath);
        $content = str_replace('{{ defaultTheme }}', 'theme::page', $stubContent);
        $content = str_replace('{{ alias }}', Str::snake($className), $content);
        $content = str_replace('{{ className }}', $className, $content);

        $filePath = $directory . '/' . $className . '.php';
        File::put($filePath, $content);

        $this->info("Class $className created successfully in $directory.");
        return Command::SUCCESS;
    }
}
