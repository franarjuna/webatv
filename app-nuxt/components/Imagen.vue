<template>
  <div :class="tipo">
    <img :src="imagen" :class="imageClass" loading="lazy" />
  </div>
</template>
<script>
export default {
  name: 'NuxtImagen',
  props: {
    tipo: {
      type: String,
      default: '',
    },
    imagen: {
      type: String,
      default: '',
    },
    imageClass: {
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
