<template>
  <div class="min-h-screen" :class="tipo">
    <div class="w-fulltext-left lg:px-32">
      <div class="flex flex-wrap">
        <div class="w-full"><img :src="imagen1" class="w-full" /></div>
      </div>
      <div class="flex flex-wrap">
        <div class="lg:w-1/2 bg-cover bg-center" :style="bg">
          <imagen-slider :imagenes="foto1" class="w-full"></imagen-slider>
        </div>
        <div class="lg:w-1/2 bg-gray">
          <div class="bg-gray">
            <p class="w-4/5 mx-auto py-16 text-white whitespace-pre-line font-[12px] leading-none">
              {{ texto1 }}
            </p>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap">
        <div class="lg:w-1/2">
          <div class="bg-gray">
            <p class="w-4/5 mx-auto py-16 text-white whitespace-pre-line font-[12px] leading-none">
              {{ texto2 }}
            </p>
          </div>
        </div>
        <div class="lg:w-1/2 bg-cover bg-center" :style="bg"></div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtProyecto5Bloques',
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
    texto2: {
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
  computed: {
    bg() {
      let foto = ''
      this.foto2.forEach(element => {
        foto = element.name
      });
      return 'background-image:url(' + foto + ');'
    },
  },
}
</script>

<style scoped>
.imagenfull {
  background-size: cover;
  background-position: center;
}
</style>
