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
                            <p>
                                Elérkezett a várva várt pillanat. A Kajla Makett pályázat zsűrije kiválasztotta a nyertes képeket.
                            </p>
                            <p>
                                <b>                                    Szeretettel gratulálunk az alkotóknak!
                                </b>

                            </p>
                            <p>
                                Hamarosan megküldjük számotokra a nyereményeket. Tudjuk, hogy a megszerzett élmény a legszebb ajándékotok, mégis szeretnénk mi is megörvendeztetni benneteket.
                            </p>
                            <p>
                                A zsűri tagjai a művészet, a reklámszakma, a pedagógia, és a gyermekpszichológia területéről érkeztek. Minden pályázat gyönyörű volt, így a döntés sok fejtörést okozott nekik. Végül abban maradtak, hogy a legszebbnek ítélt 43 pályamunka mellett mindenki, akinek a képe felkerült oldalunkra, kapjon meglepetés ajándékot. Hamarosan tehát ezek az ajándékok is megérkeznek hozzátok. Addig is tekintsétek meg a legszebb 43 pályamunkát a Beküldött képek sorának elején.
                                <br />
                                <br />
                                Mindenkinek jó böngészést kívánunk! Ne feledjétek, Kajla egész évben vár benneteket, hogy megismerjétek hazánk csodás kincseit.
                            </p>
                        </div>

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
