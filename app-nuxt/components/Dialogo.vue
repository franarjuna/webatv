<template>
  <div :style="`background-image:url(${item.imagen})`" class="bg-cover w-full h-full bg-center">
    <span
      class="pastilla absolute top-0 left-1/2 transform -translate-x-1/2 py-1 text-lg px-6 rounded-xl rounded-t-none"
      :class="item.categoria"
      >{{ item.categoria }}</span
    >
    <div
      v-if="item.categoria !== 'agenda'"
      class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-full "
    >
      <h3
        v-if="item.categoria !== 'agenda'"
        class="px-16 text-white my-4 text-2xl"
      >
        {{ item.titulo }}
      </h3>
      <p v-if="item.categoria !== 'agenda'" class="px-16 text-white mb-8">
        {{ item.texto }}
      </p>

      <a
        :href="item.link"
        class="cursor-pointer absolute text-white top-[-8rem] left-1/2 transform -translate-x-1/2 text-md block my-16 rounded-full border px-4 py-1 w-fit"
        >ver más</a
      >
    </div>
    <div
      v-if="item.categoria === 'agenda'"
      class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
    >
      <h3 class="px-8 text-white my-4 text-xxxl text-center">
        {{ item.fecha }}
      </h3>
      <p class="px-8 text-white mb-8 text-center">
        {{ item.titulo }}
      </p>
    </div>
    <a
      v-if="item.categoria === 'agenda'"
      class="cursor-pointer text-white absolute bottom-1 left-1/2 transform -translate-x-1/2 text-md block my-16 rounded-full border px-4 py-1 w-fit"
      @click="toggle()"
      >ver más</a
    >
    <div
      v-if="item.categoria === 'agenda' && open" class="fixed top-0 left-0 w-full h-full bg-black opacity-40 z-40"
      @click="toggle()"
    ></div>
    <div
      v-if="item.categoria === 'agenda' && open"
      class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-1/3 z-50 p-16 "
    >
      <div class="absolute right-6 -top-2 w-6 h-6 cursor-pointer" @click="toggle()">
        <svg
          id="Layer_1"
          data-name="Layer 1"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 28.48 28.48"
        >
          <defs>
            <style>
              .cls-1 {
                fill: #fff;
                stroke: #969593;
                stroke-miterlimit: 10;
                stroke-width: 1.8px;
              }

              .cls-2 {
                fill: #969593;
              }
            </style>
          </defs>
          <circle class="cls-1" cx="14.24" cy="14.24" r="13.34" />
          <path
            class="cls-2"
            d="m11.78,9.55l2.43,3.59h.04l2.43-3.59h1.75l-3.31,4.58,3.64,4.8h-1.75l-2.76-3.83h-.04l-2.74,3.83h-1.75l3.63-4.8-3.31-4.58h1.75Z"
          />
        </svg>
      </div>
      <h3 class="text-white text-xxl">{{ item.fecha }}<br/>{{ item.horario ?? '' }}</h3>
      <p class="text-white text-sm my-6">Cupos limitados</p>
      <h4 class="text-white text-xl mb-2">{{ item.titulo }}</h4>
      <p class="text-white text-md">{{ item.texto }}</p>
      <p class="text-white text-sm mt-6">Oradores_</p>
      <p class="text-white text-xl mb-6">{{ item.oradores ?? '' }}</p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'NuxtDialogo',
  props: {
    item: {
      type: Object,
      default: null,
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
