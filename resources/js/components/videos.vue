<template>
<div class="videos">
  <h3>Videók</h3>
        <ul v-if="videos">
            <li v-for="{ id, caption } in videos">
                <strong>Name:</strong> {{ id }},
                <strong>Email:</strong> {{ caption }}
            </li>
        </ul>
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
        },
    }
}
</script>
