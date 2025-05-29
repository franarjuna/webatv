<template>
  <div
    class="columnadinamica flex justify-center items-center lg:min-h-[75vh] text-center overflow-hidden mb-4 lg:mb-0"
    :class="tipo"
  >
    <VueSlickCarousel v-bind="settings" class="w-full" :dots="true">
      <img
        v-for="slide in slides"
        :key="slide.name"
        :src="slide.name"
        :alt="alttext"
        class="w-full"
      />
      <template #customPaging="page">
        <div class="custom-dot">
          {{ page }}
        </div>
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
  name: 'NuxtCarousel',
  components: { VueSlickCarousel },
  props: {
    classes: {
      type: String,
      default: '',
    },
    slides: {
      type: Array,
      default: null,
    },
    tipo: {
      type: String,
      default: '',
    },
    alttext: {
      type: String,
      default: '',
    },
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
        arrows: true,
        responsive: [
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      },
    }
  },
}
</script>
