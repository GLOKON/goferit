@php
    $config = [
        'appName' => config('app.name'),
        'locale' => $locale = app()->getLocale(),
        'locales' => config('app.locales'),
    ];
    $polyfills = [
        'Promise',
        'Object.assign',
        'Object.values',
        'Array.prototype.find',
        'Array.prototype.findIndex',
        'Array.prototype.includes',
        'String.prototype.includes',
        'String.prototype.startsWith',
        'String.prototype.endsWith',
    ];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link type="text/css" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700" rel="stylesheet" />

        <!-- Main stylesheet -->
        <link type="text/css" href="{{ mix('css/app.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>

        <!-- Global Vue Config -->
        <script type="text/javascript">window.config = @json($config);</script>

        <!-- Polyfills -->
        <script type="text/javascript" src="https://cdn.polyfill.io/v2/polyfill.min.js?features={{ implode(',', $polyfills) }}"></script>

        <!-- App scripts -->
        @if (app()->isLocal())
            <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        @else
            <script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
            <script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
            <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        @endif
    </body>
</html>