<?php

if(! function_exists('__featureables')){

    function __featureables(string $featureClass, array $features = [], ?string $tag = null) {

        if(! class_exists($featureClass)) {
            return collect([]);
        }
        
        $results = $featureClass::getComponents($features, $tag);

        if(! $results->isEmpty()) {
            $results = $results->mapWithKeys(function(array $i, mixed $key) {
                return [$key => $i['view']];
            });
        }

        return $results;

    }

}

if(! function_exists('__props_badge')){

    function __props_badge(array $props = []) {
        return array_merge([
            'badge' => null
        ], $props);
    }
}

if(! function_exists('__props_class')){

    function __props_class(array $props = []) {
        return array_merge([
            'class' => '',
            'contentClass' => null,
            'style' => null,
            'contentStyle' => null,
            'withBox' => false,
            'boxColor' => null,
        ], $props);
    }
}