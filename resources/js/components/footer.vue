<template>
    <footer class="footer has-text-centered-mobile">
        <div class="container">
            <p>Hol vagy Kajla © {{ new Date().getFullYear() }} Minden jog fenntartva</p>
            <a @click="download(`docs/kajla-makett-mese-jatekszabalyzat.pdf`)">Játékszabályzat és adatkezelési nyilatkozat </a>
            <span></span>
            <a @click.prevent="openCookieModal">Süti kezelés</a>
            <span></span>
            <a @click="download(`https://www.kajla.hu`)">Kajla.hu </a>
        </div>
    </footer>
</template>

<script>
import store from '../store'

export default {
    data() {
        return {
            isCookieModalOpen: false,
        }
    },

    methods: {
        openCookieModal() {
            store.CookieModalIsVisible = !store.CookieModalIsVisible
        },
        download: function (url) {   
          window.open(url, "_blank");    
        }

    },


}
</script>