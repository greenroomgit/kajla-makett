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
        </div>
    </div>
</template>


<script>
import axios from 'axios';
import CoolLightBox from 'vue-cool-lightbox'
import 'vue-cool-lightbox/dist/vue-cool-lightbox.min.css'

const getUploads = (callback) => {

    axios
        .get('/api/published-photos', {})
        .then(response => {
            callback(null, response.data);
        }).catch(error => {
            callback(error, error.response.data);
        });
};

export default {
    components: {
        CoolLightBox
    },
    directives: {},
    data() {
        return {
            uploads: null,
            items: [],
            error: null,
            index: null,
        };
    },
    mounted() {
        getUploads((err, data) => {
            this.setData(err, data);
        });
    },
    methods: {
        setData(err, uploads) {
            if (err) {
                this.error = err.toString();
            } else {
                this.uploads = uploads;
                this.populateLightbox(uploads)
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
