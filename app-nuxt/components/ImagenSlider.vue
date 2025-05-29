<template>
  <div class="overflow-hidden" :class="tipo">
    <VueSlickCarousel v-if="imagenes !== null && imagenes !== undefined" v-bind="settings"  class="w-full">
    <img
      v-for="imagen in imagenes"
      :key="imagen.name"
      :src="imagen.name"
      :class="imageClass"
    />
    <template #customPaging="page">
      <div :id="page" class="custom-dot"></div>
    </template>
  </VueSlickCarousel>
  </div>
</template>
<script>
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
// optional style for arrows & dots
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

export default {
  name: 'NuxtImagen',
  components: { VueSlickCarousel },
  props: {
    tipo: {
      type: String,
      default: '',
    },
    imagenes: {
      type: Array,
      default() {
        return []
      },
    },
    imageClass: {
      type: String,
      default: '',
    },
  },
  data: function () {
    return {
      menuOpen: 'hidden',
      settings: {
        autoplay: true,
        dots: true,
        infinite: true,
        rows: 1,
        speed: 500,
        slidesToScroll: 1,
        swipeToSlide: true,
        arrows: true,
      },
    }
  },
}
</script>
<style scoped>
.custom-dot{
  width: 32px;
  border-radius: 0;
  background-color: #ffffff;
  font-size: 1px;
}
</style>
