<template>
  <div class=" min-h-screen " :class="tipo">
    <div class="block lg:flex w-fulltext-left lg:px-32">
      <div class="lg:w-1/2">
        <div class="hidden lg:block">
          <imagen-slider :imagenes="foto1" class="w-full"></imagen-slider>
          <p
            class="px-8 py-8 lg:pt-32 w-full lg:w-2/3 mx-auto whitespace-pre-line"
          >
            {{ texto1 }}
          </p>
        </div>
        <div class="block lg:hidden">
          <p
            class="px-8 py-8 lg:pt-32 w-full lg:w-2/3 mx-auto whitespace-pre-line"
          >
            {{ texto1 }}
          </p>
          <imagen-slider :imagenes="foto1" class="w-full"></imagen-slider>
        </div>
      </div>
      <div class="lg:w-1/2">
        <div class="bg-gray">
          <p
            class="pb-16  w-2/3 mx-auto pt-16 lg:pt-80 text-white whitespace-pre-line"
          >
            {{ texto2 }}
          </p>
          <imagen-slider :imagenes="foto2" class="w-full"></imagen-slider>
        </div>
      </div>
    </div>
    <div>
    <div v-if="foto3[0] !== undefined && foto3[0] !== null" class="block lg:flex w-full min-h-screen text-left lg:px-32" style="transform: translateY(-3px);">
        <div class="lg:w-1/2 bg-cover" :style="'background-image:url(' + foto3[0].name ?? '' + ' )'">

        </div>
        <div class="lg:w-1/2 bg-gray">
          <p
            class=" w-2/3 mx-auto py-16 text-white whitespace-pre-line"
          >
            {{ texto3 }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtSensBloque',
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
      default: 'testest',
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
