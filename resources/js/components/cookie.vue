<template>
    <div class="modal" :class="{ 'is-active': modalIsVisible}">
        <div class="modal-background"></div>
        <div class="modal-inner">
            <div class="modal-content">
                <button class="modal-close-button" aria-label="close" @click.prevent="closeModal()"></button>
                <!-- FORM WITH v-if WILL BE SHOWN BUT THEN HIDDEN AFTER SUCCESS SUBMIT -->

                <div class="yellow-box">
                  <div class="yellow-box__inner">
                        <div id="suti-kezeles" class="rich-text">
        <h1 class="title">Sütik (cookie) kezelése</h1>
        <p>Más hasonló kereskedelmi weboldalakhoz hasonlóan a makett.kajla.hu weboldal is használja azon szokásos technológiát, amelyet sütinek (cookie) hívnak, valamint web szerver log fájlokat, annak érdekében, hogy információt szerezzen be arról, hogy a felhasználók
            hogyan használják a Weboldalt. A sütik és a web szerver log fájlok használata lehetővé teszi a Weboldal üzemeltetője számára, hogy a Weboldal látogatottságát ellenőrizze és a Weboldal tartalmát az Ön személyes igényeihez igazítsa.</p>
        <p>A süti egy kisméretű információcsomag (fájl), amely gyakran egy anonimizált egyedi azonosítót hordoz. Amikor meglátogat egy weboldalt, a weboldal a számítógépének az engedélyét kéri, hogy ezt a fájlt az Ön számítógépe merevlemezének egy olyan részén
            tárolja, amely kifejezetten a sütik tárolására szolgál. Minden egyes weboldal amelyet meglátogat tud sütit küldeni a számítógépére, amennyiben az Ön által használt böngésző beállítása ezt engedélyezi. Az Ön adatainak védelme érdekében azonban
            az Ön böngészője az adott weboldalnak kizárólag azt engedélyezi, hogy ahhoz a sütihez férjen hozzá, amelyet az adott weboldal küldött a számítógépének, azaz egy weboldal a más weboldalak által küldött sütikhez nem fér hozzá. A böngészők általában
            úgy vannak beállítva, hogy fogadják a sütiket. Amennyiben azonban Ön nem kíván sütiket fogadni, beállíthatja úgy a böngészőjét, hogy az elutasítsa a sütik fogadását. Ebben az esetben elképzelhető, hogy a Weboldal néhány eleme nem fog hatékonyan
            működni, mikor Ön böngészi a Weboldalt. A sütik nem tudnak más információt nyerni a számítógépének merevlemezéről és nem hordoznak vírusokat.</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
    </div>

                  </div>
                </div>
  
            </div>
        </div>
    </div>
</template>

<script>
import store from '../store.js';

import axios from 'axios'
import _ from 'lodash'

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
            return store.CookieModalIsVisible
        }
    }

}
</script>
