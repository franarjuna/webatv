<template>
  <div class=" " :class="tipo">
  <div class="block text-center w-full lg:sw-1/2 mx-auto px-8 py-16 md:py-32 ">
    <p class="text-lg lg:text-xl lg:w-1/2 mx-auto whitespace-pre-wrap"> {{ texto }}</p>
    <a v-if="link!==''" class="text-md mt-8 rounded-full border px-4 py-2 block w-fit mx-auto" :href="link">ver más</a>
  </div></div>
</template>
<script>
export default {
  name: 'NuxtTextoDestacado',
  props: {
    texto: {
      type: String,
      default: '',
    },
    link: {
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
    return {
      menuOpen: 'hidden',
    }
  },
}
</script>
