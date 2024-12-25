<form {{ $attributes->merge([
    'method' => 'POST',
    'spellcheck' => 'false',
    'autocomplete' => 'off',
    'enctype' => 'multipart/form-data',
    'class' => 'base-flex-spacer'
]) }}>@csrf
{{ $slot }}
</form>