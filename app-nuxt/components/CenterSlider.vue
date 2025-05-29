<template>
  <div
    class="columnadinamica lg:flex justify-center items-center  text-center overflow-hidden"
    :class="tipo"
  >
    <VueSlickCarousel v-bind="settings" class="w-full">
      <div v-for="slide in slides" :key="slide.name" class="p-8">
        <img :src="slide.name" class="h-[200px] lg:h-[600px] w-auto" />
      </div>
      <template #nextArrow="arrowOption">
        <div class="custom-arrow">
          <svg class="arrow-right">
            <use xlink:href="#arrow-right" />
          </svg>
          {{ arrowOption.currentSlide }}/{{ arrowOption.slideCount }}
        </div>
      </template>
      <template #prevArrow="arrowOption">
        <div class="custom-arrow">
          <svg class="arrow-left">
            <use xlink:href="#arrow-left" />
          </svg>
          {{ arrowOption.currentSlide }}/{{ arrowOption.slideCount }}
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
  name: 'NuxtCenterSlider',
  components: { VueSlickCarousel },
  props: {
    classes: {
      type: String,
      default: '',
    },
    slides: {
      type: Array,
      default() {
        return []
      },
    },
    tipo: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
      settings: {
        autoplay: false,
        centerMode: true,
        dots: false,
        infinite: false,
        rows: 1,
        speed: 500,
        slidesToScroll: 1,
        swipeToSlide: true,
        variableWidth: true,
        arrows: true,
        centerPadding: '20px',
      },
    }
  },
}
</script>
<style scoped>
.slick-slide {
  padding-right: 2em !important;
}
.slick-slide img {
  opacity: 0.3;
}
.slick-current img {
  opacity: 1 !important;
}
.slick-current {
  border: 0;
}

.slick-disabled{
  display: none!important;
}

.slick-prev,
.slick-next {
  font-size: 0;
  line-height: 0;
  position: absolute;
  top: 50%;
  display: block;
  width: 20px;
  height: 20px;
  padding: 0;
  transform: translate(0, -50%);
  cursor: pointer;
  color: transparent;
  border: none;
  outline: none;
  background: transparent;
}
.arrow-left,.arrow-right{
  width: 20px;
}
</style>
