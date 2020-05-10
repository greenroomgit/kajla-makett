<template>
    <div class="container guide-steps">
        <div class="columns" v-if="steps">
            <div class="column" v-for="{ id, headline, description, picture } in steps">
                <div class="box">
                    <article class="media">
                        <div class="media-center">
                            <figure class="image is-640x480">
                                <img :src="'/storage/' + picture" alt="">
                            </figure>
                        </div>
                        <div class="media-content">
                            <div class="content">
                                <h3 class="title is-3">teszt szoveg {{ headline }}</h3>
                                <p>
                                    Lorem ipsum dolor sit amet hosszabb szoveg {{ description }}
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
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
    methods: {
        setData(err, steps) {
            if (err) {
                this.error = err.toString();
            } else {
                this.steps = steps;
            }
        },
    }
}
</script>
