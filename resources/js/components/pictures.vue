<template>
    <div class="picture-box">
        <div class="picture-box__inner">
            <h3 class="title">Beküldött képek</h3>
    
            <CoolLightBox :items="items" :index="index" @close="index = null">
            </CoolLightBox>
    
    
    
            <div class="picture-wrapper">
                <div class="columns is-multiline">
                    <div v-for="({caption, picture, thumb, name}, imageIndex) in uploads" :key="imageIndex" class="column is-one-quarter">
                        <div class="picture" @click="setIndex(imageIndex)">
                            <div class="picture__inner">
                                <div class=" has-text-centered">
                                    <img v-bind:src="`storage${thumb}`" alt="">
                                </div>
                            </div>
                        </div>
                        <p>{{ caption }}</p>
                    </div>
                </div>
            </div>
            <div class=" has-text-centered">
                <a v-bind:class="[isFinished ? 'finish' : 'load-more', 'button', 'is-primary']" @click='getUploads()' v-cloak>{{ buttonText }}</a>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';
import CoolLightBox from 'vue-cool-lightbox'
import 'vue-cool-lightbox/dist/vue-cool-lightbox.min.css'



export default {
    components: {
        CoolLightBox
    },
    directives: {},
    data() {
        return {
            uploads: [],
            items: [],
            error: null,
            index: null,
            isFinished: false,
            row: 0, // Record selction position
            rowperpage: 36, // Number of records fetch at a time
            buttonText: 'További képek',

        };
    },
    mounted() {
        this.getUploads();
    },
    methods: {

        getUploads(callback) {

            axios
                .get('/api/published-photos', {
                    params: {
                        'row': this.row,
                        'rowperpage': this.rowperpage
                    }
                })
                .then(response => {
                    this.setData(null, response.data);
                }).catch(error => {
                    this.setData(error, error.response.data);
                });

        },


        setData(err, uploads) {

            if (err) {
                this.error = err.toString();
            } else {

                if (uploads != '') {

                    // Update rowperpage
                    this.row += 1;

                    var len = this.uploads.length;
                    if (len > 0) {
                        this.buttonText = "Betöltés ...";
                        this.buttonText = "További képek";

                        // Loop on data and push in posts
                        for (let i = 0; i < uploads.length; i++) {
                            this.uploads.push(uploads[i]);
                        }
                    } else {
                        this.uploads = uploads;
                    }

                } else {
                    this.buttonText = "Nincs több kép";
                    this.isFinished = true;
                }

               this.populateLightbox(this.uploads)
            }

        },

        populateLightbox(uploads) {
            const items = [];

            uploads.map(function(picture) {
                items.push('storage' + picture.picture)
            })

            this.items = items
        },

        setIndex(index) {
            this.index = index
        }



    }
}
</script>
