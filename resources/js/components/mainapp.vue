<template>
    <div class="kajla-wrapper">
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

    export default {
        name: 'app',
        components: {
            'Hero': Hero,
            'Footer': Footer
        }
    }
</script>