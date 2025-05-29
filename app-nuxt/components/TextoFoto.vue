<template>
  <div
    class="columnadinamica lg:flex justify-center items-center text-start overflow-hidden pb-8 lg:px-16"
    :class="tipo"
  >
    <div v-if="formato == 't-f'" class="lg:w-1/2">
      <p class="m-4 lg:m-16 lg:w-3/4">{{ texto }}</p>
    </div>
    <div class="lg:w-1/2">
      <imagen-slider :imagenes="imagenes"></imagen-slider>
    </div>
    <div v-if="formato == 'f-t'" class="lg:w-1/2">
      <p class="m-4 lg:m-16 lg:w-3/4">{{ texto }}</p>
    </div>
  </div>
</template>
<script>
import ImagenSlider from './ImagenSlider.vue'
export default {
  name: 'NuxtTextoFoto',
  components: { ImagenSlider },
  props: {
    tipo: {
      type: String,
      default: '',
    },
    texto: {
      type: String,
      default: '',
    },
    formato: {
      type: String,
      default: 't-f',
    },
    imagenes: {
      type: Object,
      default() {
        return {}
      },
    },
  },
}
</script>
