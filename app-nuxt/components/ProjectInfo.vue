<template>
  <div
    class="container mx-auto columnadinamica flex justify-center items-center text-start overflow-hidden"
    :class="tipo"
  >
    <div
      v-if="!open"
      class="w-full border-y-1 border-gray-400 p-4"
      style="border-top: 1px solid"
    >
      <button
        class="mx-auto text-sm rounded-full border px-4 py-2 text-gray-400 block w-fit min-w-[50px]"
        @click="toggle"
      >
        ficha técnica
      </button>
    </div>
    <div v-if="open" class="w-full" style="border-top: 1px solid">
      <h2 class="text-[2rem] py-4 lg:py-8" style="border-bottom: 1px solid">
        Ficha Técnica
      </h2>
      <div class="grid grid-cols-1 lg:grid-cols-2 w-full">
        <p
          class="w-full py-4 lg:py-8 border-gray-400"
          style="border-bottom: 1px solid"
        >
          Ubicacion___{{ ubicacion }}
        </p>
        <p
          class="w-full py-4 lg:py-8 border-gray-400 lg:text-end"
          style="border-bottom: 1px solid"
        >
          Ciudad___{{ ciudad }}
        </p>
        <p
          class="w-full py-4 lg:py-8 border-gray-400"
          style="border-bottom: 1px solid"
        >
          Año de Construcción___{{ anio }}
        </p>
        <p
          class="w-full py-4 lg:py-8 border-gray-400 lg:text-end"
          style="border-bottom: 1px solid"
        >
          Superficie___{{ superficie }}
        </p>
        <p
          v-if="premio1 !== ''"
          class="w-full py-4 lg:py-8 border-gray-400"
          style="border-bottom: 1px solid"
        >
          Premio___{{ premio1 }}
        </p>
        <p
          v-if="premio2 !== ''"
          class="w-full py-4 lg:py-8 border-gray-400 lg:text-end"
          style="border-top: 1px solid"
        >
          Premio___{{ premio2 }}
        </p>
        <p
          v-if="premio3 !== ''"
          class="w-full py-4 lg:py-8 border-gray-400"
          style="border-top: 1px solid"
        >
          Premio___{{ premio3 }}
        </p>
      </div>
      <button
        class="mx-auto text-sm rounded-full border px-4 py-2 text-gray-400 block w-[90px] mt-8"
        @click="toggle"
      >
        <span class="block" style="transform: rotate(-90deg)">></span>
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtProjectInfo',
  props: {
    ubicacion: {
      type: String,
      default: '',
    },
    ciudad: {
      type: String,
      default: '',
    },
    anio: {
      type: String,
      default: '',
    },
    superficie: {
      type: String,
      default: '',
    },
    tipo: {
      type: String,
      default: '',
    },
    premio1: {
      type: String,
      default: '',
    },
    premio2: {
      type: String,
      default: '',
    },
    premio3: {
      type: String,
      default: '',
    },
  },
  data: function () {
    return {
      open: false,
    }
  },
  methods: {
    toggle() {
      if (this.open) {
        this.open = false
      } else {
        this.open = true
      }
    },
  },
}
</script>
