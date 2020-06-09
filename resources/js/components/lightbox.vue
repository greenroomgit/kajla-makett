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

        <div class="cool-lightbox__navigation">
          <button type="button" class="cool-lightbox-button cool-lightbox-button--prev" title="Previous" :class="buttonsClasses" v-show="(hasPrevious || loopData) && items.length > 1" @click="onPrevClick">
            <slot name="icon-previous">
              <div class="cool-lightbox-button__icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.28 15.7l-1.34 1.37L5 12l4.94-5.07 1.34 1.38-2.68 2.72H19v1.94H8.6z"></path></svg>
              </div>
            </slot>
          </button>

          <button type="button" class="cool-lightbox-button cool-lightbox-button--next" title="Next" :class="buttonsClasses" v-show="(hasNext || loopData) && items.length > 1" @click="onNextClick(false)">
            <slot name="icon-next">
              <div class="cool-lightbox-button__icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.4 12.97l-2.68 2.72 1.34 1.38L19 12l-4.94-5.07-1.34 1.38 2.68 2.72H5v1.94z"></path></svg>
              </div>
            </slot>
          </button>
        </div>
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
          <button type="button" v-if="this.slideshow && items.length > 1" title="Play slideshow" class="cool-lightbox-toolbar__btn" @click="togglePlaySlideshow">
            <svg xmlns="http://www.w3.org/2000/svg" v-if="!isPlayingSlideShow" viewBox="0 0 24 24">
              <path d="M6.5 5.4v13.2l11-6.6z"></path>
            </svg>

            <svg v-else xmlns="http://www.w3.org/2000/svg">
              <g>
                <rect id="svg_4" height="11.97529" width="11.728392" y="6.030873" x="6.259265" stroke-width="1.5" stroke="#000" fill="#000000"/>
              </g>
            </svg>
          </button>

          <button type="button" @click="showThumbs = !showThumbs" title="Show thumbnails" v-if="items.length > 1 && gallery" class="cool-lightbox-toolbar__btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M14.59 14.59h3.76v3.76h-3.76v-3.76zm-4.47 
              0h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76H5.65v-3.76zm8.94-4.47h3.76v3.76h-3.76v-3.76zm-4.47 
              0h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76H5.65v-3.76zm8.94-4.47h3.76v3.76h-3.76V5.65zm-4.47 
              0h3.76v3.76h-3.76V5.65zm-4.47 0h3.76v3.76H5.65V5.65z">
              </path>
            </svg>
          </button>
          
          <button type="button" v-if="fullScreen" @click="toggleFullScreenMode" class="cool-lightbox-toolbar__btn" title="Fullscreen">
            <svg width="20px" height="20px" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.5 11H3v4h4v-1.5H4.5V11zM3 7h1.5V4.5H7V3H3v4zm10.5 6.5H11V15h4v-4h-1.5v2.5zM11 3v1.5h2.5V7H15V3h-4z"></path>
            </svg>
          </button>

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
}
</script>