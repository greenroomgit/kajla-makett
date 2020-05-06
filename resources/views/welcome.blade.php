<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{mix('/css/app.css')}}"></link>

    </head>
    <body>

        <section id="app" class="section">
            <div class="container is-fluid">
                <mainapp></mainapp>
            </div>
        </section>

    </body>
    <script src="{{mix('/js/app.js')}}"></script>
</html>
