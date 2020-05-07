<template>
    <div class="">
        Home

        <GuideSteps />
        <PhotoUpload />
    </div>
</template>

<script>
    import GuideSteps from '../guide-steps';
    import PhotoUpload from '../photo-upload';

    export default {
        name: 'homepage',
        components: {
            'GuideSteps': GuideSteps,
            'PhotoUpload': PhotoUpload
        }
    }

</script>