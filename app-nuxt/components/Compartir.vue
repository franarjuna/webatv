<template>
  <div></div>
</template>
<script>
export default {
  name: 'NuxtCompartir',
  props: {
    classes: {
      type: String,
      default: '',
    },
    slides: {
      type: Array,
      default: null,
    },
    tipo: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
      settings: {
        dots: true,
        infinite: true,
        rows: 1,
        speed: 500,
        slidesToScroll: 1,
        swipeToSlide: true,
        arrows: false,
      },
    }
  },
}
</script>
