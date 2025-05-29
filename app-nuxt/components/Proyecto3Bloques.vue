<template>
  <div class=" min-h-screen " :class="tipo">
    <div class="block lg:flex w-fulltext-left lg:px-32">
      <div class="lg:w-1/2 bg-cover bg-center" :style="bg"> </div>
      <div class="lg:w-1/2">
        <div class="bg-gray">
          <p
            class="w-2/3 mx-auto py-16 text-white whitespace-pre-line"
          >
            {{ texto1 }}
          </p>
          <imagen-slider :imagenes="foto2" class="w-full"></imagen-slider>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtProyecto3Bloques',
  props: {
    imagen1: {
      type: String,
      default() {
        return ''
      },
    },
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
    texto1: {
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
  computed:{
    bg(){
      return "background-image:url(" +this.imagen1+ ");"
    }
  }
}
</script>

<style scoped>
.imagenfull {
  background-size: cover;
  background-position: center;
}
</style>
