<template>
  <div
    class="columnadinamica justify-center items-center lg:min-h-[75vh] text-center"
    :class="tipo"
  >
    <img v-if="imagen !==''" :src="imagen" class="block mx-auto w-full text-center" />
    <h4 class="mt-4 text-xl">{{ texto }}</h4>
    <h5 class="mt-1">{{ cargo }}</h5>
    <p v-if="toggle" class="mt-8 w-4/5 text-center mx-auto block whitespace-pre-wrap">{{ textolargo }}</p>
  </div>
</template>
<script>
export default {
  name: 'NuxtEquipo',
  props: {
    tipo: {
      type: String,
      default: 'w-full',
    },
    imagen: {
      type: String,
      default: 'img/fondo-azul.png',
    },
    texto: {
      type: String,
      default:
        '',
    },
    textolargo: {
      type: String,
      default:
        '',
    },
    cargo: {
      type: String,
      default:
        'Director',
    },
    toggle:{
      type: Boolean,
      default:true
    }
  },
  data: function () {
    return {}
  },
}
</script>

<style scoped>
.columnadinamica {
  background-size: cover;
  background-position: center;
}
</style>
