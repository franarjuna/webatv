<template>
  <div v-if="slides !== null" class="lg:min-h-[80vh] bg-gray-dark overflow-hidden lg:py-16">
    <VueSlickCarousel v-bind="settings">
      <div v-for="slide in slides" :key="slide.name" class="h-100 flex bg-gray-dark">
        <div
          class="grid lg:grid-cols-5 bg-cover max-h-min"
          style="padding-bottom: 100%;margin-bottom: -100%;"
          :style="slide.type === 2 ? `background-image:url(${slide.imagen})` : ''"
        >
          <div class="block lg:hidden mb-4" style="">
            <img v-if="slide.type !== 2" :src="slide.imagen" class="w-[100%]" />
          </div>
          <div class=" lg:col-span-3">
            <div class="mx-auto w-4/5">
              <span
                class="block w-fit rounded-full px-4 py-1 bg-white text-gray-dark"
                >{{ slide.categoria }}</span
              >
              <h2 class="text-xxl md:text-xxxxxl w-4/5 my-16 leading-tight text-white">
                {{ slide.titulo }}
              </h2>
              <p class="text-white w-3/4 text-xl  leading-normal">
                {{ slide.texto }}
              </p>
              <a v-if="slide.link!=''" :href="slide.link" class="block text-md  my-16 rounded-full border px-4 py-1 w-fit"
                >ver más</a
              >
            </div>
          </div>
          <div class="hidden lg:block lg:col-span-2 lg:min-h-[70vh]" style="">
            <img v-if="slide.type !== 2" :src="slide.imagen" class="w-[100%]" />
          </div>
        </div>
      </div>
      <template #customPaging="page">
        <div :id="page" class="custom-dot mt-4"></div>
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
  name: 'NuxtContentSlider',
  components: { VueSlickCarousel },
  props: {
    slides: {
      type: Array,
      default: null
    }
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
