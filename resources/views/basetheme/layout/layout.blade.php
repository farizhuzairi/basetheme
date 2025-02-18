<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
{!! $__manifest !!}
<title>{{ $__title }}</title>
{!! $__css !!}<script>if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) { document.documentElement.classList.add('dark'); } else { document.documentElement.classList.remove('dark'); }</script>
@livewireStyles
@stack('stylesheets')
</head>
<body class="base-layout" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }">
@php

$contents = themeConfig()->layoutVariable();
echo ${$contents};

@endphp
@livewireScripts
{!! $__js !!}
@stack('scripts')
</body>
</html>