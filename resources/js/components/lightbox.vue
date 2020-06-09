<template>
  <transition name="cool-lightbox-modal">
    <div class="cool-lightbox" 
      v-bind:class="lightboxClasses"
      v-if="isVisible" 
      @click="closeModal"
      v-bind:style="lightboxStyles">


      <div 
        class="cool-lightbox__inner" 
        :style="innerStyles"

        @mousedown="startSwipe" 
        @mousemove="continueSwipe"
        @mouseup="endSwipe"
        @touchstart="startSwipe"
        @touchmove="continueSwipe"
        @touchend="endSwipe"
        >
        <div class="cool-lightbox__progressbar" :style="stylesInterval"></div>

        <!--/cool-lightbox__navigation-->

        <div v-if="effect === 'swipe'" 
          class="cool-lightbox__wrapper cool-lightbox__wrapper--swipe"
          :style="{
            transform: 'translate3d('+xSwipeWrapper+'px, '+ySwipeWrapper+'px, 0)',
            transition: swipeAnimation
          }"
          >
          <div 
            v-for="(item, itemIndex) in items"
            :key="itemIndex"
            ref="items"
            class="cool-lightbox__slide"
            :class="{ 'cool-lightbox__slide--current': itemIndex === imgIndex }"
          >

            <!--/imgs-slide-->
          
            <div key="video" class="cool-lightbox__iframe">
              <iframe
                class="cool-lightbox-video" 
                :src="getItemSrc(itemIndex)" 
                :style="aspectRatioVideo" 
                :key="itemIndex" 
                frameborder="0" 
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
              </iframe>

            </div>
            <!--/cool-lightbox__iframe-->
          </div>
          <!--/cool-lightbox__slide-->
        </div>
        <!--/cool-lightbox-wrapper-->
          
        <div v-if="effect === 'fade'" class="cool-lightbox__wrapper">
          <div 
            ref="items"
            class="cool-lightbox__slide cool-lightbox__slide--current"
          >
            <transition name="cool-lightbox-slide-change" mode="out-in">
              <!--/imgs-slide-->
            
              <div class="cool-lightbox__iframe">
                <transition name="cool-lightbox-slide-change" mode="out-in">
                  <iframe
                    class="cool-lightbox-video" 
                    :src="getVideoUrl(getItemSrc(imgIndex))" 
                    v-if="!checkIsMp4(getItemSrc(imgIndex))" 
                    :style="aspectRatioVideo" 
                    :key="getVideoUrl(getItemSrc(imgIndex))" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                  </iframe>

                  <video class="cool-lightbox-video" v-if="checkIsMp4(getItemSrc(imgIndex))" :style="aspectRatioVideo" :key="checkIsMp4(getItemSrc(imgIndex))" controls="" controlslist="nodownload" poster="">
                    <source :src="checkIsMp4(getItemSrc(imgIndex))" :type="'video/'+getVideoExt(getItemSrc(imgIndex))">
                    Sorry, your browser doesn't support embedded videos
                  </video> 
                </transition>
              </div>
              <!--/cool-lightbox__iframe-->

            </transition>
          </div>
          <!--/cool-lightbox__slide-->
        </div>
        <!--/cool-lightbox__wrapper-->

        <transition name="modal">
          <div v-show="checkIfIsObject(imgIndex) && (items[imgIndex].title || items[imgIndex].description)" key="caption-block" class="cool-lightbox-caption">
            <transition name="cool-lightbox-slide-change" mode="out-in">
              <h6 key="title" v-html="items[imgIndex].title" v-if="checkIfIsObject(imgIndex) && items[imgIndex].title"></h6>
            </transition>

            <transition name="cool-lightbox-slide-change" mode="out-in">
              <p key="description" v-html="items[imgIndex].description" v-if="checkIfIsObject(imgIndex) && items[imgIndex].description"></p>
            </transition>
          </div>
          <!--/cool-lightbox-caption-->
        </transition>
                <div class="cool-lightbox-toolbar" :class="buttonsClasses">


          <button type="button" class="cool-lightbox-toolbar__btn" title="Close" @click="close">
            <slot name="close">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"></path>
              </svg>
            </slot>
          </button>
        </div>

        <!--/cool-lightbox--toolbar-->
      </div>
      <!--/cool-lightbox-inner-->

    </div>
    <!--/cool-lightbox-->
  </transition>
  <!--/transition-->
</template>

<script>
import CoolLightBox from 'vue-cool-lightbox'

export default {
  name: 'LightBox',
  extends: CoolLightBox,
  methods: {
        eventListener(e) {
      switch (e.keyCode) {
        case 38:
        case 40:
        case ' ':
          return e.preventDefault()
        case 27:
          return this.close()
      }
    },

  }
}
</script>