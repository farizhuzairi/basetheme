<div class="my-5">
    <x-base::subject
    :$subject
    :$introduction
    />
    <livewire:forms.base :$name :$method :dto="$dto" :forms="$forms" :values="$values"/>
</div>