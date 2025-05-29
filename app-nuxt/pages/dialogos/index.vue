<template>
  <div>
    <NuxtLoading v-if="isLoading" />
    <section v-if="!isLoading">
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
    <div class="buscador block lg:flex lg:justify-between py-16 lg:py-32 px-8">
      <div class="w-[300px]">
        <input
          v-model="buscar"
          type="search"
          name="buscar"
          placeholder="Buscar"
          class="border-b p-2 w-full"
          @input="search($event.currentTarget.value)"
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
        <ul class="lg:flex space-x-2 lg:w-fit w-full">
          <li class="inline-block mt-4">
            <a
              class="text-sm rounded-full border px-4 py-2 cursor-pointer"
              :class="categoriaactiva === '' ? 'btnactivo' : ''"
              @click="setCategoria('')"
              >todo</a
            >
          </li>
          <li
            v-for="categoria in categorias"
            :key="categoria"
            class="inline-block mt-4"
          >
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
    <div
      class="grid grid-cols-1 lg:grid-cols-3 gap-x-0 gap-y-4 lg:gap-16 mb-16"
    >
      <div
        v-for="item in sortedItems"
        :key="item.id"
        class="relative bg-gray-bgs h-[70vh] overflow-hidden"
        :class="item.class"
        :data-categoria="item.categoria"
      >
        <dialogo :item="item"></dialogo>
      </div>
    </div>
    <div class="newsletter w-100 py-16 lg:py-40 bg-cover">
      <div
        class="w-4/5 lg:w-full lg:max-w-screen-xl mx-auto lg:flex lg:justify-between"
      >
        <div class="w-full lg:w-1/3">
          <h3 class="text-gray-600 mb-4 titulonews">Newsletter</h3>
          <p class="text-gray-600 text-xl">
            ¿Querés estar al tanto de todas las novedades? Suscribite
          </p>
        </div>
        <div class="w-full lg:w-1/2 mr-8">
          <form
            action="https://atvarquitectos.us8.list-manage.com/subscribe/post?u=c6b8435f894bad2a5561397db&amp;id=89841da699"
            method="post"
            target="_blank"
            style="text-align: right"
            data-dashlane-rid="ab1ecfa8a7b9e2cd"
            data-form-type="newsletter"
          >
            <div class="flex w-full">
              <input
                type="email"
                value=""
                name="EMAIL"
                required
                class="w-full border-0 border-b-2 border-gray-600 bg-transparent text-gray-600 placeholder-gray-600 py-1"
                placeholder="Email"
              />
            </div>
            <div class="text-end w-full">
              <button class="text-gray-600 text-sm">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <Close
      titulo="Arquitectura."
      image="/img/bgarquitectura.png"
      :nomargin="true"
      link="/arquitectura"
    ></Close>
  </div>
</template>
<script>
import ContentSlider from '~/components/ContentSlider.vue'
export default {
  name: 'DialogosPage',
  components: { ContentSlider },
  layout: 'interna',
  data: function () {
    return {
      isLoading: true,
      buscar: '',
      categoriaactiva: '',
      categorias: [
        'agenda',
        'novedades',
        'articulos',
        'miradas',
        'conversaciones',
      ],
      items: [],
      slides: [],
      comps: [],
    }
  },

  async fetch() {
    const url = `${this.$config.NUXT_PUBLIC_API_URL}/dialogos`
    try {
      const data = await this.$axios.$get(url)
      this.items = data.data
      this.categorias = data.categorias
      this.slides = data.destacado
    } catch (e) {}
    /* eslint-disable no-console */

    const urlcomps = `${this.$config.NUXT_PUBLIC_API_URL}/page?p=/dialogos`
    try {
      const data = await this.$axios.$get(urlcomps)
      this.comps = data.data.comps
      this.isLoading = false
    } catch (e) {}
  },
  head() {
    return {
      title: this.title,
    }
  },
  computed: {
    title() {
      return 'Dialogos - ATV Arquitectos'
    },
    sortedItems() {
      return this.buscador()
    },
  },
  methods: {
    setCategoria(categoria) {
      this.categoriaactiva = categoria
    },
    buscador() {
      const sitems = []
      Object.values(this.items).forEach((item) => {
        if (
          this.categoriaactiva === '' ||
          item.categoria === this.categoriaactiva
        ) {
          if (this.buscar === '') {
            sitems.push(item)
          } else if (
            item.titulo.toLowerCase().includes(this.buscar.toLowerCase()) ||
            item.texto.toLowerCase().includes(this.buscar.toLowerCase())
          ) {
            sitems.push(item)
          }
        }
      })
      return sitems
    },
    search(text) {
      if (text.length > 3) {
        this.buscador()
      }
    },
  },
}
</script>
<style scoped>
h1 {
  font-size: 4.2em;
  position: relative;
  bottom: auto;
  color: #fff;
  transform: none;
  white-space: nowrap;
  writing-mode: initial;
  margin: 0;
}
.hero {
  background-image: url('/img/dialogos-background.png');
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
  background-image: url(~/static/img/fondo-newsletter.png);
}
.titulonews {
  font-size: 3em;
}
svg {
  width: 20px;
  margin-right: 0;
  margin-left: auto;
  margin-top: 0.7rem;
}
</style>
