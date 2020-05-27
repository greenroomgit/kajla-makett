<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kajla Makett</title>
        <script defer src="{{ mix('js/entry-client.js') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{mix('/css/app.css')}}"></link>

    </head>
    <body>
        <div id="app">
                        {!! ssr('js/entry-server.js')->render() !!}

        </div>
    </body>
</html>
