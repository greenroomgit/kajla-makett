<template>
    <div class="">
        Home
    <div class="yellow-box">
        <div class="yellow-box__inner">
            <h1>sdvsd</h1>
        </div>
    </div>

        <GuideSteps />
    </div>
</template>

<script>
    import GuideSteps from '../guide-steps';
    import PhotoUpload from '../photo-upload';

    export default {
        name: 'homepage',
        components: {
            'GuideSteps': GuideSteps,
            'PhotoUpload': PhotoUpload,
        }
    }

</script>


