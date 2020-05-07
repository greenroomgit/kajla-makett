<template>
    <div id="makett-feltoltes" class="">
        <h1>Makett feltoltes</h1>

        <PhotoUpload />
    </div>
</template>

<script>

    import PhotoUpload from '../photo-upload';

    export default {
        name: 'homepage',
        components: {
                'PhotoUpload': PhotoUpload
        }
    }

</script>