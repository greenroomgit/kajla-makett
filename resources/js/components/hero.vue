<template>
    <section class="section section-hero separator">
        <div class="container">
            <Navigation />
            <div class="hero-body">
                <h1>
                    Építsd fel kajlával Magyarország<br>
                    nevezettességeit és nyerj!
                </h1>
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