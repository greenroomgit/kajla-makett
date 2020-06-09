<template>
    <div class="guide-steps separator">
        <div class="columns" v-if="steps">
            <div class="column">
                <div class="box">
                    <article class="media box__inner">
                        <div class="media-center">
                            <figure class="image is-640x480">
                                <img :src="'/assets/images/makett-csomag-01.png'" alt="">
                            </figure>
                        </div>
                        <div class="media-content">
                            <div class="content">
                                <h3 class="title is-3">Válaszd ki a kedvenc nevezetességedet!</h3>
                                <p>
Kérd az ingyenes makett csomagot, amit postán megküldünk neked. Vagy töltsd le te magad, és nyomtasd ki.                                </p>
                                <div class="box-bottom">
                                    <button class="button is-primary" @click.prevent="openKitRequestModal">Postán kérem</button>
                                                <router-link class="button is-primary" to="/makettek-letoltese">Letöltöm</router-link>

                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="column">
                <div class="box">
                    <article class="media box__inner">
                        <div class="media-center">
                            <figure class="image is-640x480">
                                <img :src="'/assets/images/makett-kajla.png'" alt="">
                            </figure>
                        </div>
                        <div class="media-content">
                            <div class="content">
                                <h3 class="title is-3">Állítsd Össze</h3>
                                <p>
                                     Az útmutató segítségével állítsd össze a makettet, majd rajzolj egy hozzá illő hátteret, és tedd mögé.
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="column">
                <div class="box">
                    <article class="media box__inner">
                        <div class="media-center">
                            <figure class="image image-else is-640x480">
                                <img :src="'/assets/images/fotos-kajla.png'" alt="">
                            </figure>
                        </div>
                        <div class="media-content">
                            <div class="content">
                                <h3 class="title is-3">Fotózz és töltsd fel</h3>
                                <p>
Fényképezd le az így megalkotott nevezetességet. Adj a képnek címet. Majd töltsd fel az oldalon!                                </p>

                                                                <div class="box-bottom">
                                    <button class="button is-primary" @click.prevent="openPhotoUploadModal">Képet küldök be</button>
                                </div>

                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <!--
            <div class="column" v-for="{ id, title, description, picture } in steps">
                <div class="box">
                    <article class="media box__inner">
                        <div class="media-center">
                            <figure class="image is-640x480">
                                <img :src="'/storage/' + picture" alt="">
                            </figure>
                        </div>
                        <div class="media-content">
                            <div class="content">
                                <h3 class="title is-3"> {{ title }}</h3>
                                <p>
                                     {{ description }}
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            -->
        </div>
    </div>
</template>


<script>
import store from '../store.js';

import axios from 'axios';

const getSteps = (callback) => {

    axios
        .get('./api/guide-steps', {  })
        .then(response => {
            callback(null, response.data);
        }).catch(error => {
            callback(error, error.response.data);
        });
};

export default {
    data() {
        return {
            steps: null,
            meta: null,
            error: null,
        };
    },
    mounted () {
        this.steps = null
        getSteps((err, data) => {
            this.setData(err, data);
        });
    },
    computed: {
        kitRequestModalIsVisible() {
            return store.kitRequestModalIsVisible
        },
        photoUploadModalIsVisible() {
            return store.photoUploadModalIsVisible
        }
    },
    methods: {
        setData(err, steps) {
            if (err) {
                this.error = err.toString();
            } else {
                this.steps = steps;
            }
        },
        openKitRequestModal() {
            store.kitRequestModalIsVisible = !store.kitRequestModalIsVisible
        },
        openPhotoUploadModal() {
            store.photoUploadModalIsVisible = !store.photoUploadModalIsVisible
        }
    }
}
</script>
