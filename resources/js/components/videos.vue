<template>
    <div class="video-box separator">
        <div class="video-box__inner">
            <h3 class="title">Kajla makett mesék</h3>

            <div class="video-wrapper">
                <div class="columns">
                    <div class="column is-9 first">
                        <a class="video-item-button" :href="'https://youtube.com/watch?v=' + videos[0].youtube_id ">
                            <div class="video-item">

                                <div class="video-item__inner has-text-centered">
                                <img :src="'https://img.youtube.com/vi/' + videos[0].youtube_id + '/mqdefault.jpg'" alt="">
                                    <img class="play-button" src="/assets/svg/button-video.svg" alt="">
                                </div>
                            </div>
                            <p>{{ videos[0].caption }}</p>
                        </a>
                    </div>
                    <div class="column">

          

                        <a class="video-item-button" v-for="{ id, caption, youtube_id }, index in videos"
                v-if="index > '0'" :href="'https://youtube.com/watch?v=' + youtube_id ">
                            <div class="video-item">

                                <div class="video-item__inner has-text-centered">
                                    <img :src="'https://img.youtube.com/vi/' + youtube_id + '/mqdefault.jpg'" alt="">
                                    <img class="play-button" src="/assets/svg/button-video.svg" alt="">
                                </div>
                            </div>
                            <p>{{ caption }}</p>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>


<script>
import axios from 'axios';

const getVideos = (callback) => {

    axios
        .get('http://localhost:8000/api/video', {  })
        .then(response => {
            callback(null, response.data);
        }).catch(error => {
            callback(error, error.response.data);
        });
};

export default {
    data() {
        return {
            videos: null,
            meta: null,
            error: null,
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
            }

            console.log(videos.length)
        },


    }
}
</script>
