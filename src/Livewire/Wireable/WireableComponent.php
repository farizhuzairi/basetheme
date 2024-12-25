<?php

namespace HaschaMedia\BaseTheme\Livewire\Wireable;

interface WireableComponent
{
    /**
     * Element Construction
     */
    public function mount(
        \Illuminate\Http\Request $request,
    );
}