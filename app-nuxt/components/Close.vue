<template>
  <div
    class="imagenclose flex justify-center items-center w-full h-[37vh] text-center relative "
    :class="nomargin ?'mt-0':'mt-16'"
    :style="{ backgroundImage: 'url(' + image + ')' }"
  >
      <div class="bg-black/30 w-full h-full absolute"></div>
    <div class=" relative z-10">
      <h5 class="text-3xl text-white mb-4">{{titulo}}</h5>
      <a v-if="link!=''" :href="link" class="text-sm rounded-full border px-4 py-2 text-white">ver más</a>
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtClose',
  props:{
    titulo:{
      type:String,
      default:""
    },
    image:{
      type:String,
      default:"img/fondo-azul.png"
    },
    link:{
      type:String,
      default:""
    },
    nomargin:{
      type:Boolean,
      default:false
    }
  },
  data: function () {
    return {}
  }
}
</script>

<style scoped>
.imagenclose {
  background-size: cover;
  background-position: center;
}
</style>
