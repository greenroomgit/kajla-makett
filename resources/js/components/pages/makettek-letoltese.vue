<template>
    <Kits />
</template>

<script>
    import Kits from '../kits';

    export default {
        name: 'kits',
        components: {
            'Kits': Kits,
        },
    metaInfo: {
        // if no subcomponents specify a metaInfo.title, this title will be used
        // all titles will be injected into this template
        title: 'Letölthető makettek'
    }

    }

</script>


