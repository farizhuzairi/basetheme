<?php

namespace Hascha\BaseTheme\Console\Commands\Builder;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateNewLivewireForm extends Command
{
    protected $signature = 'basetheme:live-form {className}';
    protected $description = 'Membuat kelas formulir untuk komponen livewire';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $className = Str::replace(" ", "", ucfirst($this->argument('className')));
        $directory = app_path('LiveTheme/Forms');
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $stubPath = base_path('vendor/haschamedia/basetheme/stubs/basetheme-liveform.stub');
        if (!$stubPath || !File::exists($stubPath)) {
            $this->error("Stub file does not exist at path $stubPath.");
            return;
        }

        $stubContent = File::get($stubPath);
        $content = str_replace('{{ className }}', $className, $stubContent);

        $filePath = $directory . '/' . $className . '.php';
        File::put($filePath, $content);

        $this->info("Class $className created successfully in $directory.");
        return Command::SUCCESS;
    }
}
