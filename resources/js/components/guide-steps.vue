<template>
<div class="guide-steps">
  <h3>Steps</h3>
        <ol v-if="steps">
            <li v-for="{ id, headline, description, picture } in steps">
                <img :src="'/storage/' + picture" alt="">
                <h3>{{ headline }}</h3>
                <p>
                    {{ description }}
                </p>
            </li>
        </ol>
</div>
</template>


<script>
import axios from 'axios';

const getSteps = (callback) => {

    axios
        .get('http://localhost:8000/api/guide-steps', {  })
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
