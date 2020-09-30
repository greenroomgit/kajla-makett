<template>
    <div id="makett-fotok" class="">
        <div class="yellow-box yellow-box--alert">
            <div class="yellow-box__inner has-text-centered ">
                <h1 class="is-size-4 is-size-3-tablet is-size-2-desktop">Nem töltöttél még fel képet?</h1>
                <p>Ne habozz, igényeld az ingyenes makett csomagot, vagy töltsd le és nyomtass sajátot. Utána már csak építened és lefotóznod kell, majd beküldeni az oldalon keresztül. </p>
                <p></p>
                <div class="has-text-centered">
                    <button class="button is-primary" @click.prevent="openPhotoUploadModal">Képet küldök be</button>
                    <button class="button is-primary" @click.prevent="openKitRequestModal">Szeretnék makettet</button>
    
                </div>
            </div>
        </div>
    
        <Jackpot v-bind:isWide="true" />
    
    
        <Pictures />
    
        <KitRequest :is-open="isKitRequestModalOpen" v-on:onClose="openKitRequestModal" />
        <PhotoUpload :is-open="isPhotoUploadModalOpen" v-on:onClose="openPhotoUploadModal" />
    
    
    </div>
</template>

<script>
import Pictures from '../pictures'
import Jackpot from '../jackpot'
import KitRequest from '../kit-request';
import PhotoUpload from '../photo-upload';
import store from '../../store.js';

export default {
    name: 'uploads',
    components: {
        'Pictures': Pictures,
        'Jackpot': Jackpot,
        'KitRequest': KitRequest,
        'PhotoUpload': PhotoUpload,
    },
    data() {
        return {
            isKitRequestModalOpen: false,
            isPhotoUploadModalOpen: false
        }
    },
    computed: {
        kitRequestModalIsVisible() {
            return store.kitRequestModalIsVisible
        },
        photoUploadModalIsVisible() {
            return store.photoUploadModalIsVisible
        }
    },
    methods: {
        openKitRequestModal() {
            store.kitRequestModalIsVisible = !store.kitRequestModalIsVisible
        },
        openPhotoUploadModal() {
            store.photoUploadModalIsVisible = !store.photoUploadModalIsVisible
        }
    },
    metaInfo: {
        // if no subcomponents specify a metaInfo.title, this title will be used
        // all titles will be injected into this template
        title: 'Belüldött képek'
    }

}
</script>