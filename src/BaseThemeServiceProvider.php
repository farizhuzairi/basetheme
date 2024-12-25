<?php

namespace HaschaMedia\BaseTheme;

use Illuminate\Support\ServiceProvider;
use HaschaMedia\BaseTheme\Support\Exists;
use HaschaMedia\BaseTheme\Services\ThemeConfig;
use HaschaMedia\BaseTheme\Contracts\Explainable;
use HaschaMedia\BaseTheme\Services\ThemeService;
use Illuminate\Contracts\Foundation\Application;
use HaschaMedia\BaseTheme\Factory\ElementFactory;
use HaschaMedia\BaseTheme\Services\Configuration;
use HaschaMedia\BaseTheme\Services\ExplainService;
use HaschaMedia\BaseTheme\Factory\ComponentFactory;
use HaschaMedia\BaseTheme\Factory\Element\HtmlElement;
use HaschaMedia\BaseTheme\Factory\Component\HtmlComponent;
use HaschaMedia\BaseTheme\Console\Commands as BaseCommands;

class BaseThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/basetheme.php', 'basetheme'
        );

        $this->registration_services();
        $this->registration_factories();

        if($this->app->runningInConsole()){
            $this->commands([
                BaseCommands\PublishBaseThemeAssets::class,
                BaseCommands\WebManifestGenerated::class,
                BaseCommands\BaseThemeAssetClean::class,
                BaseCommands\Builder\CreateNewPage::class,
                BaseCommands\Builder\CreateNewLivewireForm::class,
                BaseCommands\Dto\CreateDataSynth::class,
            ]);
        }
    }
    
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../dist/css' => public_path('basetheme/css'),
            __DIR__.'/../dist/js' => public_path('basetheme/js'),
            __DIR__.'/../dist/assets' => public_path('build/assets'),
            __DIR__.'/../resources/images/base-layout' => public_path('images/base-layout'),
            __DIR__.'/../resources/icons' => public_path('icons'),
        ], 'basetheme-assets');

        \Illuminate\Http\Request::macro('baseTheme', function() {
            return baseTheme();
        });

        \Livewire\Component::macro('liveResolveView', function(string $name) {
            return "base::livewire." . \Illuminate\Support\Str::snake($name, '-');
        });
        
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'base');

        /**
         * Defines the Livewire components directory
         */
        Exists::setLivewireComponents(
            __DIR__ . '/View/BaseLiveComponent',
            'HaschaMedia\\BaseTheme\\View\\BaseLiveComponent\\',
            'View/BaseLiveComponent/'
        );

        Exists::setPropertySynthesizer(
            app_path('Data/Synth'),
            'App\\Data\\Synth\\',
            'Data/Synth/'
        );

        Exists::setComponentNamespaces();
        Exists::setComposers();
    }

    /**
     * Registration services
     * @return void
     */
    protected function registration_services()
    {
        $this->app->singleton(Configuration::class, function (Application $app) {
            return new Configuration($app->config['basetheme']);
        });

        $this->app->scoped(ThemeConfig::class, function (Application $app) {
            return new ThemeConfig($app->make(Configuration::class));
        });

        $this->app->scoped(ThemeService::class, function () {
            return new ThemeService(
                layoutBuilder: \HaschaMedia\BaseTheme\Builder\LayoutBuilder::class
            );
        });

        $this->app->bind(Explainable::class, function (Application $app) {
            return new ExplainService($app->make(ThemeService::class));
        });
    }

    /**
     * Instance new html factories
     * @return void
     */
    protected function registration_factories()
    {
        $this->app->scoped('elementFactory',  function (Application $app) {
            return new ElementFactory(
                new HtmlElement(
                    $app->make(ThemeService::class)
                    ->layoutBuilder()
                )
            );
        });

        $this->app->scoped('componentFactory',  function (Application $app) {
            return new ComponentFactory(
                new HtmlComponent(
                    $app->make(ThemeService::class)
                    ->layoutBuilder()
                )
            );
        });

        foreach([
            [
                'class' => \HaschaMedia\BaseTheme\Features\ContentService::class,
                'attributes' => []
            ],
            [
                'class' => \HaschaMedia\BaseTheme\Features\SidebarService::class,
                'attributes' => []
            ],
        ] as $i) {
            $this->app->scoped($i['class'], function () use ($i) {
                return new $i['class'](...array_merge($i['attributes'], [
                    'factory' => app('componentFactory')
                ]));
            });
        }
    }
}
