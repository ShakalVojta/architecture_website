<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Ing. arch. Anna Laubová - architektka, která se specializuje na návrhy a realizace rodinných domů, bytových interiérů a rekonstrukce památkových objektů.">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <title>Ing. arch. Anna Laubová</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vitereactrefresh
        @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    </head>
    <body>
        <div id="app"></div>
    </body>
</html>
