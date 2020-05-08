<template>
    <div>
        <Navigation></Navigation>
        <Hero />
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-four-fifths">
                        <router-view></router-view>
                    </div>
                    <div class="column">
                        <Videos />
                    </div>
                </div>
            </div>
        </section>
        <Footer />
    </div> 
</template>

<script>
    import Hero from './hero'
    import Footer from './footer'
    import Navigation from './navigation'
    import Videos from './videos'

    export default {
        name: 'app',
        components: {
            'Hero': Hero,
            'Footer': Footer,
            'Navigation': Navigation,
            'Videos': Videos
        }
    }
</script>