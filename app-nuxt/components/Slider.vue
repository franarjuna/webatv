<template>
  <div v-if="slides !== null" :class="home ? 'mt-40 lg:mt-[137px]' : ''">
      <VueSlickCarousel v-bind="settings">
        <div v-for="slide in slides" :key="slide.name">
          <div class="visibilidadlg">
            <img
              :src="slide.name"
              :class="
                home
                  ? 'lg:w-full w-auto object-cover object-center h-[70vh] lg:h-[100vh] lg:h-auto'
                  : 'w-100'
              "
              :alt="alttext"
            />
          </div>

          <div class="visibilidadsm">
            <img
              :src="slide.mobile ?? slide.name"
              :class="home ? 'w-full object-cover object-center ' : 'w-100'"
              :alt="alttext"
            />
          </div>
          <p
            v-if="slide.texto !== null"
            class="absolute text-xl lg:text-xxl bottom-16 px-4 lg:bottom-12 lg:px-12 text-white lg:w-1/3"
          >
            {{ slide.texto }}
          </p>
        </div>
        <template #customPaging="page">
          <div :id="page" class="custom-dot"></div>
        </template>
      </VueSlickCarousel>
    </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

export default {
  name: 'NuxtSlider',
  components: { VueSlickCarousel },
  props: {
    home: {
      type: Boolean,
      default: false,
    },
    slides: {
      type: Array,
      default: null,
    },
    alttext: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
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
.visibilidadlg {
  display: block;
}
.visibilidadsm {
  display: none;
}
@media (max-width: 1024px) {
  .visibilidadlg {
    display: none;
  }
  .visibilidadsm {
    display: block;
  }
}
</style>
