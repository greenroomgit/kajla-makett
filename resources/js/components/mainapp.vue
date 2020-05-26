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
        <cookie-law buttonText="Elfogadom">
            <div slot="message">
                Ez a honlap sütiket használ. A sütik elfogadásával kényelmesebbé teheti a böngészést. A honlap további használatával hozzájárulását adja a sütik használatához.
                <router-link to="/suti-kezeles">További információ</router-link>
            </div>
    
        </cookie-law>
    
    </div>
</template>

<script>
import Hero from './hero'
import Footer from './footer'
import Navigation from './navigation'
import CookieLaw from 'vue-cookie-law'

export default {
    name: 'app',
    components: {
        'Hero': Hero,
        'Footer': Footer,
        'Navigation': Navigation,
        "CookieLaw": CookieLaw
    },
    metaInfo: {
      // if no subcomponents specify a metaInfo.title, this title will be used
      // all titles will be injected into this template
      titleTemplate: '%s | Kajla Makett'
    }

}
</script>