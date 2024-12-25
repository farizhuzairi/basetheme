<div {{
    $attributes->merge(['class' => $attributes->prepends('base-page flex flex-col')])
}}>
@php
if(isset($__content)) {

    foreach($__content as $_name => $_element) {
        echo e($_element);
    }

}

@endphp
</div>