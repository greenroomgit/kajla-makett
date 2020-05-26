<template>
    <div class="video-box separator" v-if="videos">

    <CoolLightBox 
      :items="items" 
      :index="index"
      @close="index = null">
    </CoolLightBox>


        <div class="video-box__inner">
            <h3 class="title">Kajla makett mesék</h3>

            <div class="video-wrapper">
                <div class="columns">
                    <div class="column is-9 first" v-if="videos[0]">
                        <a class="video-item-button" @click="setIndex(0)">
                            <div class="video-item">

                                <div class="video-item__inner has-text-centered">
                                    <img class="play-button" src="/assets/svg/button-video.svg" alt="">
                                    <img class="video-thumb" :src="'https://img.youtube.com/vi/' + videos[0].youtube_id + '/mqdefault.jpg'" alt="">
                                </div>
                            </div>
                            <h3>{{ videos[0].caption }}</h3>
                        </a>
                    </div>
                    <div class="column">
                        
                        <vue-custom-scrollbar class="scroll-area"  :settings="scrollSettings">


          

                        <a class="video-item-button" v-for="{ id, caption, youtube_id }, i in videos"
                        v-if="i > '0'" @click="setIndex(i)">
                            <div class="video-item">

                                <div class="video-item__inner has-text-centered">
                                    <img class="play-button" src="/assets/svg/button-video.svg" alt="">
                                    

                                    <div class="video-thumb">
                                        <img :src="'https://img.youtube.com/vi/' + youtube_id + '/mqdefault.jpg'" alt="">
                                    </div>
                                </div>
                            </div>
                            <p>{{ caption }}</p>
                        </a>
                        </vue-custom-scrollbar>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>


<script>
import axios from 'axios';
import vueCustomScrollbar from 'vue-custom-scrollbar'
import CoolLightBox from 'vue-cool-lightbox'
import 'vue-cool-lightbox/dist/vue-cool-lightbox.min.css'

const getVideos = (callback) => {

    axios
        .get('/api/video', {  })
        .then(response => {
            callback(null, response.data);
        }).catch(error => {
            callback(error, error.response.data);
        });
};

export default {
    components: {
        vueCustomScrollbar,
        CoolLightBox
    },
    data() {
        return {
            videos: [],
            items: [],
            meta: null,
            error: null,
            index: null,
            scrollSettings: {
                maxScrollbarLength: 60
            }
        };
    },
    mounted () {
        this.users = null
        getVideos((err, data) => {
            this.setData(err, data);
        });
    },
    methods: {
        setData(err, videos) {
            if (err) {
                this.error = err.toString();
            } else {
                this.videos = videos;
                this.populateLightbox(videos)

            }

        },

        populateLightbox(videos) {
            const items = [];

            videos.map(function(video){
                items.push({
                   src: "https://www.youtube.com/watch?v=" + video.youtube_id,
                   title: video.caption,
                })                
            })

            this.items = items
        },


        open: function (url) {   
            window.open(url, "_blank");    
        },

        setIndex(index) {
            this.index = index
        }

    }
}
</script>


<style >
</style>
