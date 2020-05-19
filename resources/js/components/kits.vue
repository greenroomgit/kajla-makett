<template>
    <div>
        <div class="kit-list ">
            <div class="kit-list__inner">

                <div class="kit-wrapper picture-box">
                <h2 class="title title is-size-4 is-size-3-tablet is-size-2-desktop">Letölthető makettek</h2>
                    <div class="columns is-multiline">
                        <div v-for="({name, a5, a6, thumbnail}, index) in kits" :key="index"
                            class="column is-one-quarter">
                            <div class="kit-box">
                                <div class="kit-box__inner">
                                    <img v-bind:src="`storage/${thumbnail}`" alt="">
                                </div>

                                <p class="kit-box__title">{{ name }}</p>


                                <p class="kit-box__downloads">
                                    <a  @click="download(`storage/${a5}`)">A5 méretben</a>
                                    <a @click="download(`storage/${a6}`)">A6 méretben</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <div class="columns is-centered">
        <img src="/assets/svg/howto.svg" alt="">

        </div>


    </div>


</template>


<script>
    import axios from 'axios';


    const getKits = (callback) => {

        axios
            .get('/api/kits', {})
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

      download: function (url) {   
          window.open(url, "_blank");    
      }

        }
    }

</script>
