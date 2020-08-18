<template>
    <section :class="[
                'section section-hero separator ', 
                isHomepage ? 'hero--home' : ''
                ]">
        <div class="container">
            <div class="hero-body">
                <h1 class="">
                    <b>Alkoss csodát!</b>
                    Építsd fel kajlával Magyarország<br>
                    nevezettességeit, és nyerj!
                </h1>
                <p>
                    <span>A játékot meghosszabbítottuk</span> <span>2020. szeptember 30-ig!</span>
                </p>
            </div>

                    <div class="hero__family hero__family--left"></div>
        <div class="hero__family hero__family--right"></div>

        </div>

    </section>
</template>

<script>
    export default {
        name: 'hero',
        data() {
            return {
                isHome: false
            }
        },
        computed: {
            isHomepage() {
                return this.$route.path === '/';
            }
        }
    }
</script>