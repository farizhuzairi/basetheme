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