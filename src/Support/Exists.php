<?php

namespace HaschaMedia\BaseTheme\Support;

use Livewire\Livewire;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Blade;
use HaschaMedia\BaseTheme\Support\Manager;
use Illuminate\Database\Eloquent\Relations\Relation;

class Exists
{
    public static function setComponentNamespaces(): void
    {
        /**
         * Base Theme Component
         */
        Blade::componentNamespace(
            'HaschaMedia\\BaseTheme\\View\\BaseComponent',
            'base-component'
        );

        /**
         * Base Component, with Component Class
         */
        Blade::componentNamespace(
            'HaschaMedia\\BaseTheme\\View\\Components',
            'component'
        );

        /**
         * Panel Component
         */
        Blade::componentNamespace(
            'HaschaMedia\\BaseTheme\\View\\BaseComponent\\Panels',
            'panel'
        );

        /**
         * Drip Content Component
         */
        Blade::component(
            'HaschaMedia\\BaseTheme\\View\\Components\\DripContent\\Index',
            'drip-content'
        );

        /**
         * Button Component
         */
        Blade::componentNamespace(
            'HaschaMedia\\BaseTheme\\View\\Components\\Buttons',
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
            \HaschaMedia\BaseTheme\View\Composers\ServiceComposer::class
        );
    }

    /**
     * Defines the Livewire components directory
     * @return void
     */
    public static function setLivewireComponents(string $directory, string $baseNamespace, string $separator = "")
    {
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
            'gridable-order' => \HaschaMedia\BaseTheme\View\LiveFeatures\Gridable\Item::class,
            'charts' => \HaschaMedia\BaseTheme\View\LiveFeatures\Charts\Index::class,
            'menu-hero' => \HaschaMedia\BaseTheme\View\LiveFeatures\Menu\Hero\Index::class,
        ] as $name => $class) {
            Livewire::component(
                $name,
                $class
            );
        }
    }

    /**
     * Synthesizer Registration
     * @return void
     */
    public static function setPropertySynthesizer(string $directory, string $baseNamespace, string $separator = "")
    {
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