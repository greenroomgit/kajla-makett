<template>
    <div>
        <div class="picture-box">
            <div class="picture-box__inner">
                <h3 class="title">Makettek letöltése</h3>

                <div class="picture-wrapper">
                    <div class="columns is-multiline">
                        <div v-for="({name, a5, a6, thumbnail}, index) in kits" :key="index"
                            class="column is-one-quarter">
                            <div class="picture">
                                <div class="picture__inner">
                                    <div class="picture-center has-text-centered">
                                        <img v-bind:src="`storage/${thumbnail}`" alt="">
                                    </div>
                                </div>

                                <p>{{ name }}</p>

                                <p>
                                    <a :href="`storage/${a5}`">A5 méretben</a>
                                </p>
                                <p>
                                    <a :href="`storage/${a6}`">A6 méretben</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="/assets/svg/howto.svg" alt="">


    </div>


</template>


<script>
    import axios from 'axios';


    const getKits = (callback) => {

        axios
            .get('http://localhost:8000/api/kits', {})
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
                callback(error, error.response.data);
            });
    };

    export default {
        data() {
            return {
                kits: null,
                error: null,
            };
        },
        mounted() {
            getKits((err, data) => {
                console.log(data)
                this.setData(err, data);
            });
        },
        methods: {
            setData(err, kits) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.kits = kits;
                }

            },


        }
    }

</script>
