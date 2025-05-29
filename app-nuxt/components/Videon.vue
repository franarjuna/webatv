<template>
  <video-player src="https://www.youtube.com/watch?v=s4ObxcdXoFE"/>
</template>

<script>
import VideoPlayer from 'nuxt-video-player'
require('nuxt-video-player/src/assets/css/main.css')
export default {
  name: 'NuxtVideon',
  components:{
    VideoPlayer
  },
  props:{
    slides: {
      type: Array,
      default: null
    }
  },
  data() {
    return {
      settings: {
        dots: true,
        infinite: true,
        rows: 1,
        speed: 500,
        slidesToScroll: 1,
        swipeToSlide: true,
        arrows: false,
      },
    }
  },
}
</script>
