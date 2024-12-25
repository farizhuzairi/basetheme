<?php

namespace Hascha\BaseTheme\Traits;

use Closure;
use Hascha\BaseTheme\Traits\Nameable;
use Hascha\BaseTheme\Factory\ThemeFactory;
use Hascha\BaseTheme\Traits\Has\HasGlobalDataComposer;

trait ThemeModelFactory
{
    use Nameable, HasGlobalDataComposer;
    
    /**
     * Html layout (base template)
     * 
     * @var \Hascha\BaseTheme\Builder\Factory\ThemeFactory
     */
    protected $factory;

    /**
     * Memulai pembuatan data kunstruksi tema.
     * Layout model secara otomatis dibangun dan dijalankan dalam mode lambat (lazy).
     * 
     */
    final protected function setFactory(
        string $class,
        string $requirement,
        array $requirementArguments,
        Closure $rendered
    ): void
    {
        $this->factory = $class::make();

        $_pageTitle = $this->factory->service()->pageTitle();
        if(! empty($_pageTitle)) {
            $this->title = $_pageTitle;
        }

        // Requirement Method
        $this->$requirement(...$requirementArguments);

        /**
         * Add new elements,
         * created by theme model type
         */
        $els = $this->withElements();
        if($els ==! false || ! empty($els)) {
            foreach($els as $el) {
                $this->factory->element(...$el);
            }
        }

        /**
         * Factory Theme Model;
         * Menyusun konstruksi pembangunan model tema berdasarkan referensi kelas tema yang disediakan dalam konfigurasi.
         */
        $this->factory->theme();
        
        // Final layout view construction with Closure
        $rendered($this->factory);
    }

    /**
     * Memeriksa dan memastikan ketersediaan objek model tema yang harus dipenuhi,
     * termasuk diantaranya menjalankan perluasan objek / sifat melalui fungsional khusus yang dapat ditambahkan (kustomisasi) oleh pengguna.
     * @return void
     */
    final protected function requirements(array $boots, array $requiredAttributes)
    {

        /**
         * Memberikan nilai default jika Properti / Atribut tidak bernilai.
         */
        $this->defineAttributes($requiredAttributes, function($key, $value) {
            $this->factory->withAttribute($key, $value);
        });
        
        /**
         * Default Boot Method and others,
         * mendorong perilaku atau fungsi yang perlu disertakan dalam proses membangun model tema.
         */
        foreach($boots as $boot) {
            if(method_exists($this, $boot)) {
                $this->$boot();
            }
        }

    }

    /**
     * Atur nilai default jika Properti / Atribut bernilai null (kosong)
     * @return void
     */
    private function defineAttributes(array $attributes, Closure $factory)
    {
        foreach($attributes as $_name => $defaultValue) {

            if(empty($this->$_name)) {
                $this->$_name = $defaultValue; // set default
            }

            // send data (as attribute) to factory
            $factory($_name, $this->$_name);

        }
    }

    /**
     * Memanggil Function / Method yang diperlukan atau method yang di-override atau ditambahkan oleh pengguna sebagai fungsional bawaan.
     * Atau, melakukan pemanggilan fungsional / metode yang diharuskan (secara default untuk mendukung theme model factory) tanpa secara ekspilist di-override atau ditambahkan oleh pengguna.
     * @return void
     */
    private function defineMethodes(array $methods)
    {
        foreach($methods as $_method => $_arguments) {
            if(method_exists($this, $_method)) {
                $this->$_method(...$_arguments); // set default
            }
        }
    }

    /**
     * Checking callback via boot() method
     * @return void
     */
    final protected function __has_default_callback()
    {
        foreach([
            'useDarkMode' => true,
            'title' => $this->title,
        ] as $_key => $_value) {
            if(! $this->factory->service()->hasData($this->global_key($_key))) {
                $this->factory->service()->withData($this->global_key($_key), $_value);
            }
        }

        /**
         * Default Components ... if default theme
         */
        if($this->theme === themeConfig()->defaultThemeModel()) {
            foreach([] as $_base => $_data) {
                explain()->$_base()->data($_data);
            }
        }
    }

    /**
     * If necessary, specify required elements or special elements that should be rendered.
     * This will override similar elements, and add elements that are not listed by default.
     * @return array|bool
     */
    protected function withElements()
    {
        $elements = themeConfig()->defaultElements();
        
        return [
            [
                'element' => $elements['htmlHeader'],
                'attributes' => [
                    'theme' => $this->theme
                ]
            ],
            [
                'element' => $elements['htmlBody'],
                'attributes' => []
            ],
            [
                'element' => $elements['htmlFooter'],
                'attributes' => []
            ],
        ];
    }
}