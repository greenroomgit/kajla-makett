<template>
    <div class="modal" :class="{ 'is-active': modalIsVisible}">
        <div class="modal-background"></div>
        <div class="modal-inner">
            <div class="modal-content">
                <button class="modal-close-button" aria-label="close" @click.prevent="closeModal()"></button>
                <!-- FORM WITH v-if WILL BE SHOWN BUT THEN HIDDEN AFTER SUCCESS SUBMIT -->

                <div class="yellow-box">
                  <div class="yellow-box__inner">
                        <div class="rich-text">
                            <p>A Kajla Makett pályázat lezárult, köszönjük, hogy ilyen sokan velünk játszottatok!</p>

                            <p>A zsűri most összeül, és kiválasztja a legszebb képeket, majd a nyertes alkotókkal felvesszük a kapcsolatot a fődíj kézbesítésével kapcsolatban!</p>

                            <p>Ne felejtsétek, Kajla egyész évben vár Titeket, böngésszétek a kajla.hu-t. Látogassatok el a Kajla körökre, és gyűjtsétek a Kajla karikákat!</p>    </div>

                  </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import store from '../store.js';

export default {
    props: {
        isOpen: Boolean,
        default: false,
    },
    data() {
        return {
        }
    },
    methods: {
        closeModal() {
            this.$emit('onClose')
        }
    },
    computed: {
        modalIsVisible() {
            return store.EndingModalIsVisible
        }
    }

}
</script>
