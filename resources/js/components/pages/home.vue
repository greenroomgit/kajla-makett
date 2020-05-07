<template>
    <div class="">
        Home

        <GuideSteps />
    </div>
</template>

<script>
    import GuideSteps from '../guide-steps';

    export default {
        name: 'homepage',
        components: {
            'GuideSteps': GuideSteps
        }
    }

</script>