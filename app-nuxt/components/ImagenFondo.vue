<template>
  <div
    class="imagenfull flex justify-center items-center w-full min-h-[60vh] md:min-h-screen text-center relative"
    :class="bloque"
    :style="{ backgroundImage: 'url(' + imagen + ')' }"
  >
    <h1 v-if="h1 !== ''">{{ h1 }}</h1>
    <div class="w-3/4">
      <img
        v-if="logo !== ''"
        :src="logo"
        class="block mx-auto w-2/3 lg:w-1/3"
      />
      <p
        class="text-xl lg:text-xxl my-8 w-3/4 lg:w-1/2 mx-auto text-white whitespace-pre-line"
      >
        {{ texto }}
      </p>
      <a
        v-if="link !== ''"
        :href="link"
        class="text-sm rounded-full border px-4 py-2"
        >ver más</a
      >
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtImagenFondo',
  props: {
    imagen: {
      type: String,
      default: 'img/fondo-azul.png',
    },
    logo: {
      type: String,
      default: '',
    },
    texto: {
      type: String,
      default: '',
    },
    h1: {
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
  },
  data: function () {
    return {}
  },
}
</script>

<style scoped>
.imagenfull {
  background-size: cover;
  background-position: center;
}

h1 {
  position: absolute;
  bottom: 3em;
  left: 22px;
  color: #fff;
  transform: rotate(-180deg);
  transform-origin: initial;
  white-space: nowrap;
  writing-mode: vertical-lr;
  font-size: 3em;
  margin: 0;
}

@media (max-width: 760px) {
  h1 {
    position: absolute;
    bottom: 1em;
    color: #fff;
    transform: none;
    transform-origin: initial;
    white-space: nowrap;
    writing-mode: initial;
    font-size: 2.5em;
    margin: 0;
  }
}
</style>
