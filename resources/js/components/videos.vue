<template>
    <div class="video-box separator">
        <div class="video-box__inner">
            <h3 class="title">Kajla makett mesék</h3>

            <div class="video-wrapper">
                <div class="columns">
                    <div class="column is-9 first">
                        <a class="video-item-button" :href="'https://youtube.com/'">
                            <div class="video-item">
                                <div class="video-item__inner has-text-centered">
                                    <img class="play-button" src="/assets/svg/button-video.svg" alt="">
                                </div>
                            </div>
                            <p>Kovács Petike influencer makett meséje</p>
                        </a>
                    </div>
                    <div class="column">
                        <a class="video-item-button" :href="'https://youtube.com/'">
                            <div class="video-item">
                                <div class="video-item__inner has-text-centered">
                                    <img class="play-button" src="/assets/svg/button-video.svg" alt="">
                                </div>
                            </div>
                            <p>Kovács Petike</p>
                        </a>
                        <a class="video-item-button" :href="'https://youtube.com/'">
                            <div class="video-item">
                                <div class="video-item__inner has-text-centered">
                                    <img class="play-button" src="/assets/svg/button-video.svg" alt="">
                                </div>
                            </div>
                            <p>Kovács Petike</p>
                        </a>
                        <a class="video-item-button" :href="'https://youtube.com/'">
                            <div class="video-item">
                                <div class="video-item__inner has-text-centered">
                                    <img class="play-button" src="/assets/svg/button-video.svg" alt="">
                                </div>
                            </div>
                            <p>Kovács Petike</p>
                        </a>
                    </div>
                </div>
            </div>

            <!--
            <div class="video-wrapper columns" v-if="videos">
                <div class="video-item column"
                v-for="{ id, caption, youtube_id } in videos"
                :class="{ 'active': videos.length === 0 }">
                    <div class="video-item__inner">
                        <a :href="'https://youtube.com/watch?v=' + youtube_id ">
                            <img :src="'https://img.youtube.com/vi/' + youtube_id + '/mqdefault.jpg'" alt="">
                            <p>
                                {{ caption }}
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            -->
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
