<template>
  <div
    class="block lg:flex w-full lg:min-h-screen text-left lg:px-16"
    :class="tipo"
  >
      <div class="w-full lg:w-1/2">
        <div>
          <imagen-slider :imagenes="foto1" class="w-full"></imagen-slider>
          <p
            v-if="texto2 !== ''"
            class="p-8 lg:px-8 lg:py-16 md:py-28 w-2/3 mx-auto whitespace-pre-line"
          >
            {{ texto2 }}
          </p>
        </div>
      </div>
      <div class="w-full lg:w-1/2">
        <div class="">
          <p
            class="p-8 lg:pb-16 w-full lg:w-2/3 mx-auto lg:pt-32 md:pt-64 whitespace-pre-line"
          >
            {{ texto1 }}
          </p>
          <imagen-slider :imagenes="foto2" class="w-full"></imagen-slider>
        </div>
      </div>
    </div>
</template>
<script>
export default {
  name: 'NuxtLivBloque',
  props: {
    foto1: {
      type: Array,
      default() {
        return []
      },
    },
    foto2: {
      type: Array,
      default() {
        return []
      },
    },
    foto3: {
      type: Array,
      default() {
        return []
      },
    },
    texto1: {
      type: String,
      default: '',
    },
    texto2: {
      type: String,
      default: '',
    },
    texto3: {
      type: String,
      default: '',
    },
    bloque: {
      type: String,
      default: '',
    },
    tipo: {
      type: String,
      default: '',
    },
  },
  data: function () {
    return {}
  },
}
</script>

<style scoped>
.imagenfull {
  background-size: cover;
  background-position: center;
}
</style>
