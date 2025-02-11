<x-base::form
name="{{ $name }}"
method="{{ $method }}"
wire:submit="submit"
>
@foreach($form->attributes as $name => $form)
@if($form['type'] === 'submit')
<x-dynamic-component :component="$form['form']" :key="liveKey($form['name'], $name)"
:id="$form['name']"
:type="$form['type']"
:name="$form['name']"
:label="$form['label']"
wire:loading.attr="disabled"
/>
@else
<x-dynamic-component :component="$form['form']" :key="liveKey($form['name'], $name)"
:id="$form['name']"
:type="$form['type']"
:name="$form['name']"
:label="$form['label']"
:placeholder="$form['placeholder'] ?? null"
wire:model.blur="form.{{ $name }}"
/>
@endif
@endforeach
</x-base::form>