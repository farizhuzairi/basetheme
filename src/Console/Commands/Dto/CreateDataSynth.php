<?php

namespace HaschaMedia\BaseTheme\Console\Commands\Dto;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateDataSynth extends Command
{
    protected $signature = 'basetheme:data {feature} {className} {--data}';
    protected $description = 'Synthesizer Livewire Support, Data Transfer Object';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $dtoFeature = ucfirst($this->argument('feature'));
        $dtoClassName = $this->argument('className');
        $withData = $this->option('data');

        $withDirectory = "";
        if($dtoClassName) {
            $explode = explode('/', $dtoClassName);
            $count = count($explode);
            foreach($explode as $_k => $_v) {
                if(($count - 1) !== $_k) $withDirectory .= "\\{$_v}";
            }
            $dtoClassName = $explode[$count - 1];
        }

        switch($dtoFeature) {
            case "Board":
                $parentModel = \HaschaMedia\BaseTheme\Data\BoardDto::class;
                $parentModelName = 'BoardDto';
                $stubModel = 'synth-board-model-class.stub';
                $stubSynth = 'synth-board-class.stub';
                break;
            case "Hero":
            case "MenuHero":
                $parentModel = \HaschaMedia\BaseTheme\Data\MenuHeroDto::class;
                $parentModelName = 'MenuHeroDto';
                $stubModel = 'synth-menu-hero-model-class.stub';
                $stubSynth = 'synth-menu-hero-class.stub';
                break;
            default:
                $parentModel = null;
                $parentModelName = '';
                $stubModel = '';
                $stubSynth = '';
                break;
        }

        if(empty($parentModel) || empty($dtoClassName)) {
            $this->info('Feature not found or not available.');
            $this->fail('Feature not found or not available.');
            $this->fail('Feature not found or not available.');
        }

        $dtoModelName = $dtoClassName . 'Dto';
        $dtoSynthName = $dtoClassName . 'Synth';

        /**
         * Data Model
         */
        $modelClassName = Str::replace(" ", "", $dtoModelName);
        $dirModel = app_path('Data/Models' . str_replace('\\', '/', $withDirectory));

        $model = base_path('vendor/haschamedia/basetheme/stubs/' . $stubModel);
        if (!$model || !File::exists($model)) {
            $this->error("Stub file does not exist at path $model.");
            return 1;
        }

        $stubModelContent = File::get($model);
        $modelContent = str_replace('{{ modelClassDir }}', $withDirectory, $stubModelContent);
        $modelContent = str_replace('{{ modelClassName }}', $modelClassName, $modelContent);
        $modelContent = str_replace('{{ parentModel }}', $parentModel, $modelContent);
        $modelContent = str_replace('{{ parentModelName }}', $parentModelName, $modelContent);

        /**
         * Synth Class
         */
        $synthClassName = Str::replace(" ", "", $dtoClassName);
        $dirSynth = app_path('Data/Synth' . str_replace('\\', '/', $withDirectory));

        $synth = base_path('vendor/haschamedia/basetheme/stubs/' . $stubSynth);
        if (!$synth || !File::exists($synth)) {
            $this->error("Stub file does not exist at path $synth.");
            return 1;
        }

        $extraDir = function($d) {
            if(! empty($d)) {
                return "$d\\";
            }
            return "\\";
        };
        $stubSynthContent = File::get($synth);
        $synthContent = str_replace('{{ synthClassDir }}', $withDirectory, $stubSynthContent);
        $synthContent = str_replace('{{ modelClassDir }}', $extraDir($withDirectory), $synthContent);
        $synthContent = str_replace('{{ synthClassName }}', $dtoSynthName, $synthContent);
        $synthContent = str_replace('{{ modelName }}', $dtoModelName, $synthContent);
        $synthContent = str_replace('{{ uniqueName }}', Str::uuid(), $synthContent);

        /**
         * Model EXECUTE
         */
        if (!File::isDirectory($dirModel)) {
            File::makeDirectory($dirModel, 0755, true);
        }
        $filePathModel = $dirModel . '/' . $dtoModelName . '.php';
        File::put($filePathModel, $modelContent);

        /**
         * Synth EXECUTE
         */
        if (!File::isDirectory($dirSynth)) {
            File::makeDirectory($dirSynth, 0755, true);
        }
        $filePathSynth = $dirSynth . '/' . $dtoSynthName . '.php';
        File::put($filePathSynth, $synthContent);

        /**
         * Results
         */
        $this->info("Class $dtoModelName created successfully in $dirModel.");
        $this->info("Class $dtoSynthName created successfully in $dirSynth.");
        return 0;
    }
}
