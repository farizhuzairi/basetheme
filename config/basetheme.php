<?php

return [

    /**
     * Default Page
     * Theme used when theme model is not specified.
     * 
     */
    'default_theme_model' => 'theme::page',
    
    /**
     * Default Layout
     * Layout used when theme model config is not specified.
     * 
     */
    'default_layout' => 'layout',

    /**
     * Web Attributes
     * 
     */
    'attributes' => [
        'logo' => asset('icons/android-chrome-512x512.png'),
        'icon' => asset('icons/android-chrome-512x512.png'),
    ],

    /**
     * Web Manifest | Favicon
     * 
     */
    'manifest' => [
        'icon1' => '<link rel="apple-touch-icon" sizes="180x180" href="' . asset("icons/apple-touch-icon.png") .'">',
        'icon2' => '<link rel="icon" type="image/png" sizes="32x32" href="' . asset("icons/favicon-32x32.png") .'">',
        'icon3' => '<link rel="icon" type="image/png" sizes="16x16" href="' . asset("icons/favicon-16x16.png") .'">',
        'json' => '<link rel="manifest" href="' . asset("icons/site.webmanifest") .'">',
    ],

    /**
     * Stylesheets
     * 
     */
    'stylesheets' => [
        '<link href="' . asset('basetheme/css/styles.css') . '" rel="stylesheet" type="text/css">',
        '<link href="' . asset('basetheme/css/main.css') . '" rel="stylesheet" type="text/css">'
    ],

    /**
     * Javascripts
     * 
     */
    'javascripts' => [
        '<script src="' . asset('basetheme/js/main.js') . '"></script>'
    ],

    /**
     * Use Tailwind CSS
     * 
     */
    'tailwind' => [
        'cdn' => env('TAILWIND_CDN', false),
        'url' => '<script src="https://cdn.tailwindcss.com"></script>'
    ],

    /**
     * Default Html Element
     * 
     */
    'default_elements' => [
        'htmlHeader' => \Hascha\BaseTheme\Components\Elements\Header::class,
        'htmlBody' => \Hascha\BaseTheme\Components\Elements\Body::class,
        'htmlFooter' => \Hascha\BaseTheme\Components\Elements\Footer::class,
    ],

    /**
     * A list of available component options for each rendered element.
     * 
     */
    'element_components' => [

        /**
         * Header Components
         */
        'header' => [
            'default' => 'header',
            'auth' => 'header-auth',
        ],

        /**
         * Body Components
         */
        'body' => [
            'default' => 'body',
        ],

        /**
         * Footer Components
         */
        'footer' => [
            'default' => 'footer',
        ],
    ],

    /**
     * Empty data view
     * 
     */
    'view_empty' => 'base::components.empty',

    /**
     * Feature Content Services
     * 
     */
    'contents' => [
        'content' => [
            'methods' => [
                'header',
                'topHeader',
                'subHeader',
                'main',
                'extra',
                'footer',
                'copyright',
            ]
        ],
        'sidebar' => [
            'methods' => [
                'main',
                'tab',
                'headPanel'
            ]
        ],
    ],

];