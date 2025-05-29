<template>
  <div
    class="flex justify-center items-center min-h-[50vh] md:min-h-[40vh] lg:min-h-[75vh] text-center bg-cover bg-center"
    :class="bloque"
    :style="{ backgroundImage: 'url(' + imagen + ')' }"
  >
    <div class="">
      <p class="text-2xl text-white mb-4"> {{ texto }} </p>
      <a v-if="link!==''" :href="link" class="text-sm rounded-full border px-4 py-2 text-white ">ver más</a>
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtImagenFondo',
  props:{
    bloque:{
      type: String,
      default: "w-full"
    },
    imagen:{
      type:String,
      default: "img/fondo-azul.png"
    },
    texto:{
      type:String,
      default: "Sens representa una de las líneas principales en el pensamiento<br />y el desarrollo arquitectónico de ATV."
    },
    link:{
      type:String,
      default: ""
    }
  },
  data: function () {
    return { }
  },
}
</script>
