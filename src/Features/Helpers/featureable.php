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