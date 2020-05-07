<template>
    <div>
        <Navigation></Navigation>
        <section class="hero">
            <div class="hero-body">
                <div class="container">
                <h1 class="title">
                    Hero title
                </h1>
                <h2 class="subtitle">
                    Hero subtitle
                </h2>
                </div>
            </div>
        </section>
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
    </div> 
</template>

<script>
    import Navigation from './navigation'
    import Videos from './videos'
    export default {
        name: 'app',
        components: {
            'Navigation': Navigation,
            'Videos': Videos
        }
    }
</script>