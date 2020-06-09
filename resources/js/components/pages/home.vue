<template>
    <div>
        <GuideSteps />
        <div class="separator">
            <div class="columns">
                <div class="column">
                    <div class="info-horizontal has-text-centered">
                        <div class="info-horizontal__inner">
                            <p>A feltöltött képeket egy gyors ellenőrzés után publikáljuk. Ha közzétettük a képedet, akkor újabb makett csomaggal lepünk meg. <br> A játék végén egy zsűri fogja kiválasztani a legszebb képeket. Az alkotók pedig különdíjat nyernek.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Jackpot />
        <div class="yellow-box separator">
            <div class="yellow-box__inner">
                <div class="columns is-vcentered ">
                    <div class="column is-half has-text-centered has-text-left-tablet">
                        <h3 class="title is-4 is-size-3-tablet">Építsd fel Kajlával Magyarország<br> nevezetességeit, és nyerj!</h3>
                    </div>
                    <div class="column is-half has-text-centered">
                        <button class="button is-primary" @click.prevent="openPhotoUploadModal">Képet küldök be</button>
                        <button class="button is-primary" @click.prevent="openKitRequestModal">Szeretnék makettet</button>
                    </div>
                </div>
            </div>
        </div>
        <Videos />
        <Pictures />
        <KitRequest :is-open="isKitRequestModalOpen" v-on:onClose="openKitRequestModal" />
        <PhotoUpload :is-open="isPhotoUploadModalOpen" v-on:onClose="openPhotoUploadModal" />
    </div>
</template>

<script>
import store from '../../store.js';

import GuideSteps from '../guide-steps';
import KitRequest from '../kit-request';
import PhotoUpload from '../photo-upload';
import Videos from '../videos'
import Pictures from '../pictures'
import Jackpot from '../jackpot'

export default {
    name: 'homepage',
    components: {
        'GuideSteps': GuideSteps,
        'KitRequest': KitRequest,
        'PhotoUpload': PhotoUpload,
        'Videos': Videos,
        'Pictures': Pictures,
        'Jackpot': Jackpot
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

    head() {
        return {
            meta: [{
                'og:title': 'this.item.title',
                'og:description': 'this.item.type'
            }]
        }
    },
    metaInfo: {
      // if no subcomponents specify a metaInfo.title, this title will be used
      // all titles will be injected into this template
      title: 'Játék',
          meta: [
      {
        key: 'og:title',
        name: 'og:title',
        content: 'Játék',
      },
      {
        key: 'twitter:title',
        name: 'twitter:title',
        content: 'Játék',
      },
    ]}

}
</script>


