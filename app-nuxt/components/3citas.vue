<template>
  <div class="grid grid-cols-3 min-h-32 bg-no-repeat bg-auto p-16" :class="tipo" :style="`background-image:url(${imagen})`">
    <div v-for="(texto, index) in textos" :key="index" class="">
      <p
        :class="objClass"
        v-html="texto.replace(/(?:\r\n|\r|\n)/g, '<br />')"
      ></p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtCitas',
  props: {
    tipo: {
      type: String,
      default: '',
    },
    imagen: {
      type: String,
      default: '',
    },
    textos: {
      type: Array,
      default: null,
    },
    objClass: {
      type: String,
      default: '',
    },
  },
  data: function () {
    return {
      menuOpen: 'hidden',
    }
  },
}
</script>
<style scoped>

</style>
