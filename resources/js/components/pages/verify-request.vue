<template>
    <div id="felhasznalasi-feltetelek" class="">
        <h1>Felhasznalasi feltetelek</h1>
    </div>
</template>

<script>


import axios from 'axios';
export default {
    mounted() {
        const token = this.$route.query.token;
          axios.post('/api/kit-request/verify-email', {'token': token}, {}
          ).then(response => {
            console.log(response)
          }).catch(err => {
            if (err.response.status === 422) {

            }
          });

    }

}
</script>