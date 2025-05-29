<template>
  <div class="block lg:flex lg:my-8">
    <div class="lg:w-1/3 self-center">
      <p v-if="texto1 !== ''" class="lg:w-1/2 p-8 lg:p-0" style="white-space: pre-line;" v-html="texto1"></p></div>
    <div class="lg:w-2/3">
      <p class="lg:w-2/3 pb-4  p-8 lg:p-0" style="white-space: pre-line;" v-html="texto2"></p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtDobleTexto',
  props: {
    texto1: {
      type: String,
      default: '',
    },
    texto2: {
      type: String,
      default: '',
    },
  },
}
</script>
