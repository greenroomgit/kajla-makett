<template>
    <div class="">
        <GuideSteps />
        <div class="separator">
            <div class="columns">
                <div class="column">
                    <div class="info-horizonatal has-text-centered">
                        <div class="info-horizonatal__inner">
                            <p>A feltöltött képeket egy gyors ellenőrzés után publikáljuk. Ha közzé tettük  a képedet, 
                            akkor újabb makett csomaggal lepünk meg. A játék végén pedig egy zsűri fogja kiválasztani 
                            a legjobb képeket, a beküldői pedig a külön díjban részesülnek.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="yellow-box separator">
            <div class="yellow-box__inner">
                <div class="columns">
                    <div class="column is-half">
                        <h3 class="title is-3">Építsd fel Kajlával Magyarország<br> nevezetességeit és nyerj!</h3>
                    </div>
                    <div class="column">
                        <button class="button is-primary">Szeretnék makettet</button>
                    </div>
                    <div class="column">
                        <button class="button is-primary" @click.prevent="openPhotoUploadModal">Képet küldök be</button>
                    </div>
                </div>
            </div>
        </div>
        <Videos />
        <Pictures />
        <PhotoUpload :is-open="isPhotoUploadModalOpen" v-on:onClose="openPhotoUploadModal"/>
    </div>
</template>

<script>
    import GuideSteps from '../guide-steps';
    import PhotoUpload from '../photo-upload';
    import Videos from '../videos'
    import Pictures from '../pictures'

    export default {
        name: 'homepage',
        components: {
            'GuideSteps': GuideSteps,
            'PhotoUpload': PhotoUpload,
            'Videos': Videos,
            'Pictures': Pictures
        },
        data() {
            return {
                isPhotoUploadModalOpen: false
            }
        },
        methods: {
            openPhotoUploadModal() {
                this.isPhotoUploadModalOpen = !this.isPhotoUploadModalOpen
            }
        }
    }

</script>


