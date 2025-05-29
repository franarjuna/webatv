<template>
  <div>
    <section>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-16">
        <div class="col-span-2 md:col-span-3 hidden"></div>
        <div class="col-span-2 md:col-span-1 hidden"></div>
        <div class="col-span-2 hidden"></div>
        <component
          :is="component.type"
          v-for="(component, index) in comps"
          :key="index"
          v-bind="component.options"
        >
        </component>
      </div>
    </section>
    <div class="buscador flex justify-between py-32 px-8">
      <div class="w-[300px]">
        <input
          v-model="buscar"
          type="search"
          name="buscar"
          placeholder="Buscar"
          class="border-b p-2 w-full"
        />
        <div class="text-end w-full">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.41 14.41">
            <circle
              cx="8.96"
              cy="5.45"
              r="4.79"
              class="cls-1"
              data-v-36e78768=""
            ></circle>
            <line
              x1="5.45"
              y1="8.96"
              x2=".66"
              y2="13.75"
              class="cls-1"
              data-v-36e78768=""
            ></line>
          </svg>
        </div>
      </div>
      <div class="categorias">
        <ul class="flex space-x-2 w-fit">
          <li>
            <a
              class="text-sm rounded-full border px-4 py-2 cursor-pointer"
              :class="categoriaactiva === '' ? 'btnactivo' : ''"
              @click="setCategoria('')"
              >todo</a
            >
          </li>
          <li v-for="categoria in categorias" :key="categoria">
            <a
              class="text-sm rounded-full border px-4 py-2 cursor-pointer"
              :class="categoriaactiva === categoria ? 'btnactivo' : ''"
              @click="setCategoria(categoria)"
              >{{ categoria }}</a
            >
          </li>
        </ul>
      </div>
    </div>
    <div class="w-full mb-16">
      <div
        v-for="(item, index) in sortedItems"
        :key="item.id"
        class="relative flex"
        :data-categoria="item.categoria"
      >
        <div class="w-2/5"><img :src="item.imagen" class="w-full" /></div>
        <div class="w-3/5 px-16 py-8" :class="index % 2 ? 'claro' : 'oscuro'">
          <h2 class="w-1/2 text-xxxl mb-16">{{ item.nombre }}</h2>
          <h3 class="text-lg">{{ item.titulo }}</h3>
          <p class="text-md mb-4">{{ item.texto }}</p>
          <a
            :href="item.link"
            class="cursor-pointer block my-16 rounded-full border px-4 py-1 w-fit"
            :class="
              index % 2 ? 'text-black border-black' : 'text-white border-white'
            "
            >ver más</a
          >
        </div>
      </div>
    </div>

    <Close titulo="Dialogos" image="/img/dialogos.png" :nomargin="true"></Close>
  </div>
</template>
<script>
export default {
  name: 'PublicacionesPage',
  layout: 'interna',
  data: function () {
    return {
      buscar: '',
      categoriaactiva: '',
      categorias: ['nuestras publicaciones'],
      items: [],
      comps: [],
    }
  },
  async fetch() {
    const url = `${this.$config.NUXT_PUBLIC_API_URL}/publicaciones`
    try {
      const data = await this.$axios.$get(url)
      this.items = data.data
    } catch (e) {}
    /* eslint-disable no-console */

    const urlcomps = `${this.$config.NUXT_PUBLIC_API_URL}/page?p=/publicaciones`
    try {
      const data = await this.$axios.$get(urlcomps)
      this.comps = data.data.comps
    } catch (e) {}
  },
  computed: {
    sortedItems() {
      const sitems = []
      this.items.forEach((item) => {
        if (
          this.categoriaactiva === '' ||
          item.categoria === this.categoriaactiva
        ) {
          if (this.buscar === '') {
            sitems.push(item)
          } else if (item.titulo.indexOf(this.buscar)) {
            sitems.push(item)
          }
        }
      })
      return sitems
    },
  },
  methods: {
    setCategoria(categoria) {
      this.categoriaactiva = categoria
    },
  },
}
</script>
<style scoped>
h1 {
  font-size: 3em;
  position: relative;
  bottom: auto;
  color: #fff;
  transform: none;
  white-space: nowrap;
  writing-mode: initial;
  margin: 0;
}
.hero {
  background-image: url('/img/hero_publicaciones.png');
  background-size: cover;
  background-position: center;
  min-height: 40vh;
}
.cls-1 {
  fill: none;
  stroke: #969593;
  stroke-linecap: round;
  stroke-miterlimit: 10;
  stroke-width: 1.31px;
}
input {
  border-color: #969593;
}
.pastilla.agenda {
  background-color: gray;
  color: #e1e0dc;
}
.btnactivo {
  background: #e1e0dc;
  color: gray;
}
.newsletter {
  background-image: url(~/static/img/fondonewsletter.png);
}
svg {
  width: 20px;
  margin-right: 0;
  margin-left: auto;
  margin-top: 0.7rem;
}

.oscuro {
  @apply text-white;
  background-color: #939290;
  h2,
  h3,
  p {
    @apply text-white;
  }
}
.claro {
  @apply text-gray-700;
  background-color: #e1e0dc;
  h2,
  h3,
  p {
    @apply text-gray-600;
  }
}
</style>
