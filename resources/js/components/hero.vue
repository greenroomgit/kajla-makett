<template>
    <section :class="[
                'section section-hero separator ', 
                isHomepage ? 'hero--home' : ''
                ]">
        <div class="container">
            <div class="hero-body">
                <h1 class="">
                    Építsd fel kajlával Magyarország<br>
                    nevezettességeit és nyerj!
                </h1>
            </div>
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