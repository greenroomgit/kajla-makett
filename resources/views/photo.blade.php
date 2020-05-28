<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kajla Makett</title>
            <meta property="og:type" content= "website" />
        <meta property="og:site_name" content="Kajla Makett" />
        <meta property="og:image" itemprop="image primaryImageOfPage" content="{{ URL::asset('storage'.$image['picture']) }}" />


    

    <!-- Styles -->
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    </link>

</head>

<body>




    <div id="app">
        <div class="kajla-wrapper"><a href="/" class="site-logo router-link-exact-active router-link-active"><img
                    src="/assets/images/kajla-logo.png"></a>
            <header class="site-header">
                <nav role="navigation" aria-label="main navigation" class="navbar">
                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-start navbar-left"><a href="/"
                                class="navbar-item router-link-exact-active router-link-active">Játék</a> <a
                                href="/bekuldott-kepek" class="navbar-item">Beküldött képek</a></div>
                        <div class="navbar-end navbar-right"><a href="/makettek-letoltese" class="navbar-item">Makettek
                                letöltése</a></div>
                    </div>
                </nav> <a role="button" data-target="navMenu" aria-label="menu" aria-expanded="false"
                    class="navbar-burger"><span aria-hidden="true"></span> <span aria-hidden="true"></span> <span
                        aria-hidden="true"></span></a>
            </header>

            <section class="section section-hero separator ">
                <div class="container">
                    <div class="hero-body">
                        <h1>
                            Építsd fel kajlával Magyarország<br>
                            nevezettességeit és nyerj!
                        </h1>
                    </div>
                    <div class="hero__family hero__family--left"></div>
                    <div class="hero__family hero__family--right"></div>
                </div>
            </section>

            <div class="container">

                <div class="picture-box">
                    <div class="picture-box__inner">
                        <!---->

                                    <div class="picture">
                                        <div class="">
                                            <div class=" has-text-centered"><img
                                                    src="{{ URL::asset('storage'.$image['picture']) }}" alt=""></div>
                                        </div>
                                    </div>
                                    <p>{{ $image['caption'] }}</p>
                        <div class=" has-text-centered"><a class="load-more button is-primary" href="/">Tovább a főoldalra</a></div>
                    </div>
                </div>
            </div>
            <!---->
        </div>
    </div>



</body>

</html>
