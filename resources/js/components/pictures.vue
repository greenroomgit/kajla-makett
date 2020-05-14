<template>
   <div class="picture-box">
        <div class="picture-box__inner">
            <h3 class="title">Beküldött képek</h3>

            <div class="picture-wrapper">
                <div class="columns is-multiline">
                    <div v-for="({caption, picture}, index) in uploads" :key="index" class="column is-one-quarter">
                        <div class="picture">
                            <div class="picture__inner">
                                <div class="picture-center has-text-centered">
                                    <img v-bind:src="`storage${picture}`"  alt="">
                                </div>
                            </div>
                        </div>
                        <p>{{ caption }}</p>    
                    </div>
                </div>
            </div>
            <div class="modal">
                <div class="modal-background"></div>
                    <div class="modal-content">
                        <swiper class="swiper" :options="swiperOption">
                            <swiper-slide v-for="({caption, picture}, index) in uploads" :key="index" class="column is-one-quarter">
                                <img :data-src="`/storage/${picture}`" class="swiper-lazy">
                                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            </swiper-slide>
                            <div class="swiper-pagination" slot="pagination"></div>
                            <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
                            <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
                        </swiper>
                    </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'

const getUploads = (callback) => {

    axios
        .get('http://localhost:8000/api/published-photos', {  })
        .then(response => {
            callback(null, response.data);
        }).catch(error => {
            callback(error, error.response.data);
        });
};

export default {
    components: {
        Swiper,
        SwiperSlide
    },
    directives: {
        swiper: directive
    },
    data() {
        return {
            uploads: null,
            error: null,
            swiperOption: {
                lazy: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                }
            }
        };
    },
    mounted () {
        getUploads((err, data) => {
            console.log(data)
            this.setData(err, data);
        });
    },
    methods: {
        setData(err, uploads) {
            if (err) {
                this.error = err.toString();
            } else {
                this.uploads = uploads;
            }

        },


    }
}
</script>
