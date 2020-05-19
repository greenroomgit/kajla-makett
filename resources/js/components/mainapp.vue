<template>
    <div class="kajla-wrapper">
        <router-link class="site-logo" to="/">
              <img src="assets/images/kajla-logo.png">
          </router-link>

        <Navigation />
        <Hero />
        <div class="container container--main">
            <router-view></router-view>
        </div>

        <Footer />
    </div> 
</template>

<script>
    import Hero from './hero'
    import Footer from './footer'
    import Navigation from './navigation'

    export default {
        name: 'app',
        components: {
            'Hero': Hero,
            'Footer': Footer,
            'Navigation': Navigation
        }
    }
</script>