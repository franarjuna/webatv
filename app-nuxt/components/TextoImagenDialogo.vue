<template>
      <div class="block lg:flex lg:my-8">
        <div class="lg:w-1/3 self-end">
          <p class="lg:w-1/2 text-xxl p-8 text-center lg:text-left" v-html="texto"></p>
        </div>
        <div class="lg:w-2/3">
          <div :class="tamaniofoto" :data-tamanio="tamaniofoto"><Slider :slides="slides" :alttext="alttext"></Slider>
          </div></div>
      </div>
</template>
<script>
export default {
  name: 'NuxtTextoImagenDialogo',
  props: {
    texto: {
      type: String,
      default: '',
    },
    slides: {
      type: Array,
      default: null,
    },
    alttext: {
      type: String,
      default: '',
    },
    bloque: {
      type: String,
      default: '',
    },
    tamaniofoto: {
      type: String,
      default: '',
    },
  },
  computed:{

  }
}
</script>
