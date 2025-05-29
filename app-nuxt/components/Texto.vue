<template>
  <div :class="tipo">
    <div :class="objClass" v-html="texto.replace(/(?:\r\n|\r|\n)/g, '<br />')"></div>
  </div>
</template>
<script>
export default {
  name: 'NuxtTexto',
  props: {
    tipo: {
      type: String,
      default: '',
    },
    texto: {
      type: String,
      default: '',
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
.abajo{
  bottom:0px;
  right:0px;
}
</style>
