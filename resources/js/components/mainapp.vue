<template>
    <div class="kajla-wrapper">
        <Navigation />
        <Hero />
        <div class="container">
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