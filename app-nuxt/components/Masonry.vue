<template>
  <div class="columns-1 lg:columns-3 w-full">
    <div v-for="bloque in bloques" :key="bloque">
      <img :src="bloque.imagen" class="block mx-auto w-full text-center" />
      <h4 class="mt-2 text-xl">{{ bloque.texto }}</h4>
      <h5 class="mt-2">{{ bloque.cargo }}</h5>
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtMasonry',
  props: {
    tipo: {
      type: String,
      default: '',
    },
    bloques: {
      type: Array,
      default() {
        return []
      },
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
