<template>
   <div class="picture-box">
        <div class="picture-box__inner">
            <h3 class="title">Beküldött képek</h3>

            <div class="picture-wrapper">
                <div class="columns is-multiline">
                    <div v-for="{caption, picture} in uploads" class="column is-one-quarter">
                        <img src="assets/svg/picture-bg.svg" alt="">
                        <img v-bind:src="'storage/' + picture"  alt="">
                        <p>{{ caption }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

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
    data() {
        return {
            uploads: null,
            error: null,
        };
    },
    mounted () {
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
            }

        },


    }
}
</script>
