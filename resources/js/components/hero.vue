<template>
    <section class="section section-hero">
        <div class="container">
            <Navigation />
            <div class="hero-body">
                <h1>
                    Építsd fel kajlával Magyarország<br>
                    nevezettességeit és nyerj!
                </h1>
                <a href="" class="button is-primary">button is-primary</a>
            </div>
        </div>
    </section>
</template>

<script>
import Navigation from './navigation'
    export default {
        name: 'app',
        components: {
            'Navigation': Navigation,
        }  
    }
</script>