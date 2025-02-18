<?php

namespace Hascha\BaseTheme\Support;

use Livewire\Livewire;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Blade;
use Hascha\BaseTheme\Support\Manager;
use Illuminate\Database\Eloquent\Relations\Relation;

class Exists
{
    public static function setComponentNamespaces(): void
    {
        /**
         * Base Theme Component
         */
        Blade::componentNamespace(
            'Hascha\\BaseTheme\\View\\BaseComponent',
            'base-component'
        );

        /**
         * Base Component, with Component Class
         */
        Blade::componentNamespace(
            'Hascha\\BaseTheme\\View\\Components',
            'component'
        );

        /**
         * Button Component
         */
        Blade::componentNamespace(
            'Hascha\\BaseTheme\\Builder\\Layout\\Support',
            'support'
        );

        /**
         * Panel Component
         */
        Blade::componentNamespace(
            'Hascha\\BaseTheme\\View\\BaseComponent\\Panels',
            'panel'
        );

        /**
         * Drip Content Component
         */
        Blade::component(
            'Hascha\\BaseTheme\\View\\Components\\DripContent\\Index',
            'drip-content'
        );

        /**
         * Button Component
         */
        Blade::componentNamespace(
            'Hascha\\BaseTheme\\View\\Components\\Buttons',
            'buttons'
        );
    }

    public static function setComposers(): void
    {
        Facades\View::composer(
            [
                'base::basetheme.components.*',
                'base::basetheme.elements.*',
                'base::basetheme.features.*',
                'base::components.*',
                'base::livewire.*',
                'components.*',
            ],
            \Hascha\BaseTheme\View\Composers\ServiceComposer::class
        );
    }

    /**
     * Defines the Livewire components directory
     * @return void
     */
    public static function setLivewireComponents(string $directory, string $baseNamespace, string $separator = "")
    {
        if (is_dir($directory)) {

            foreach (
                Manager::getFiles($directory, $baseNamespace, $separator)
                as $_file
            ) {
                Livewire::component(
                    $_file['kebab'],
                    $_file['namespace']
                );
            }
    
            foreach ([
                'gridable-order' => \Hascha\BaseTheme\View\LiveFeatures\Gridable\Item::class,
                'charts' => \Hascha\BaseTheme\View\LiveFeatures\Charts\Index::class,
                'menu-hero' => \Hascha\BaseTheme\View\LiveFeatures\Menu\Hero\Index::class,
            ] as $name => $class) {
                Livewire::component(
                    $name,
                    $class
                );
            }

        }
    }

    /**
     * Synthesizer Registration
     * @return void
     */
    public static function setPropertySynthesizer(string $directory, string $baseNamespace, string $separator = "")
    {
        if (is_dir($directory)) {

            foreach (
                Manager::getFiles($directory, $baseNamespace, $separator)
                as $_file
            ) {
                Livewire::propertySynthesizer($_file['namespace']);
                Relation::morphMap([
                    $_file['kebab'] => $_file['namespace'],
                ]);
            }
            
        }
    }
}