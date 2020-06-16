<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kajla Makett</title>
<meta property="og:title" content="Kajla Makett">
<meta property="og:url" content="">
<meta property="og:description" content="">
<meta property="og:type" content="website">
<meta property="og:image" content="https://makett.kajla.hu/assets/images/mtu_kajla-3d_kihivas_kv_v5.jpg">
        <!-- Styles -->
        <link rel="stylesheet" href="{{mix('/css/app.css')}}"></link>

    </head>
    <body>
        <div id="app">
            <mainapp></mainapp>
        </div>
    </body>
    <script src="{{mix('/js/app.js')}}"></script>
</html>
