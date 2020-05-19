<template>
    <div id="felhasznalasi-feltetelek" class="has-text-centered">
        <h1>{{ title }}</h1>
<br id="3">
            <router-link class="button is-primary" to="/">Tovább a nyitóoldalra</router-link>

    </div>
</template>

<script>


import axios from 'axios';
export default {
      data() {
        return {
            title: 'Köszönjük az igénylését!',
        };
    },

    mounted() {
        const token = this.$route.query.token;
          axios.post('/api/kit-request/verify-email', {'token': token}, {}
          ).then(response => {

          }).catch(err => {
            this.title = err.response.data.error;
          });

    }

}
</script>