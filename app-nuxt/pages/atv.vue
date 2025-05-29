<template>
  <Transition :duration="{ enter: 1000, leave: 1000 }">
    <div>
      <imagen-fondo h1="ATV." :imagen="data.img" />

      <section v-if="loading === false" class="bg-gray-back py-16 lg:px-8 px-4">
        <div class="container mx-auto">
          <div class="lg:flex block relative border-b-4 border-white">
            <h4 class="block">{{ 'Visión' }}</h4>
            <div class="self-center lg:pl-8 w-full lg:mr-44">
              <p
                class="lg:w-1/2 text-gray-dark lg:py-24 py-8 text-xl lg:max-w-[900px]"
              >
                {{ data.vision }}
              </p>
            </div>
          </div>
          <div class="block w-100 h-8"></div>
          <div class="lg:flex block">
            <h4 class="inv lg:hidden block">{{ 'Misión' }}</h4>
            <div class="w-full lg:pr-8">
              <p
                class="max-w-[900px] lg:w-1/2 text-gray-dark lg:justify-self-end text-start lg:py-24 py-8 text-xl lg:float-right"
              >
                {{ data.mision }}
              </p>
            </div>

            <h4 class="inv hidden lg:block">{{ 'Misión' }}</h4>
          </div>
        </div>
        <div class="hidden lg:block">
          <center-slider :slides="slider"></center-slider>
        </div>
      </section>
      <section
        v-if="loading === false"
        class="lg:hidden bg-gray-back pb-16 gap-0"
      >
        <div class="columns-2 gap-0">
          <img
            v-for="slide in slider"
            :key="slide.name"
            :src="slide.name"
            class="w-full"
            :class="slide.texto !== '' ? 'full-width-in-columns' : ''"
          />
        </div>
      </section>

      <texto-destacado :texto="data.cita" link="" />
      <section v-if="loading === false">
        <div
          v-if="data.gerencia !== null"
          class="grid lg:grid-cols-3 gap-16 w-full"
        >
          <component
            :is="component.type"
            v-for="component in data.gerencia"
            :key="component.name"
            v-bind="component.options"
            :toggle="opened"
          ></component>
        </div>
        <div class="text-center">
          <a
            class="text-md block my-16 rounded-full border px-4 py-1 w-[90px] mx-auto"
            @click="toggle"
          >
            <span v-if="opened" class="block rotate-90">{{ '<' }}</span>
            <span v-else>ver más</span>
          </a>
        </div>
        <div
          v-if="data.equipo !== null"
          class="columns-1 lg:columns-3 gap-16 mb-16"
        >
          <div
            v-for="bloque in data.equipo"
            :key="bloque.equipo_id"
            class="break-inside-avoid text-center relative mb-16"
          >
            <div class="relative">
              <img :src="bloque.imagen" class="w-full mb-0" />
              <a
                v-if="
                  bloque.texto !== '' && togglePropio !== bloque.equipo_nombre
                "
                class="text-md block rounded-full border w-fit px-4 py-1 text-white absolute left-1/2 transform -translate-x-1/2 bottom-8"
                @click="toggleEquipo(bloque.equipo_nombre)"
                >ver más</a
              >
            </div>
            <div
              class="mt-0 text-gray-words pb-8"
              :class="
                togglePropio === bloque.equipo_nombre ? 'bloqueactivo' : ''
              "
            >
              <h4 class="pt-4 text-xl">{{ bloque.equipo_nombre }}</h4>
              <h5 class="mt-1">{{ bloque.cargo }}</h5>
              <p
                v-if="bloque.texto && tog9glePropio === bloque.equipo_nombre"
                class="my-8 w-3/4 text-center mx-auto block"
                v-html="bloque.texto.replace(/(?:\r\n|\r|\n)/g, '<br />')"
              ></p>
              <a
                v-if="togglePropio === bloque.equipo_nombre"
                class="text-white"
                @click="toggleEquipo('')"
              >
                <img src="/img/arrowup.png" class="w-16 block mx-auto" />
              </a>
            </div>
          </div>
        </div>
      </section>
      <section class="pb-16 pt-8" style="background-color: #e1e0dc">
        <div class="container mx-auto w-[90vw]">
          <h3 class="text-xxxl mx-auto my-8">EQUIPO</h3>
          <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-32">
            <div>
              <equipo-lista
                class="mb-8"
                :nombre="'PLANIFICACIÓN ESTRATÉGICA'"
                :list="gerentePlanificacion"
              />
              <equipo-lista
                class="mb-8"
                :nombre="'PERSONAS Y CULTURA'"
                :list="responsableArea"
              />
              <equipo-lista
                nombre="ÁREA DE PRODUCCIÓN"
                :list="areaProduccion"
              />
            </div>

            <div class="self-center">
              <div>
                <equipo-lista
                  nombre="ADMINISTRACIÓN Y FINANZAS"
                  :list="administracion"
                />
              </div>
            </div>

            <div>
              <div>
                <equipo-lista
                  class="mb-32"
                  nombre="ÁREA PROYECTUAL"
                  :list="proyectual"
                />
                <equipo-lista nombre="ÁREA COMERCIAL" :list="comercial" />
              </div>
            </div>
          </div>
        </div>
      </section>
      <Close
        titulo="Arquitectura."
        image="/img/bgarquitectura.png"
        link="/arquitectura"
        :nomargin="true"
      ></Close>
    </div>
  </Transition>
</template>
<script>
import CenterSlider from '~/components/CenterSlider.vue'
import EquipoLista from '~/components/EquipoLista.vue'
import ImagenFondo from '~/components/ImagenFondo.vue'
export default {
  name: 'AtvPage',
  components: { CenterSlider, ImagenFondo, EquipoLista },
  layout: 'interna',

  data: function () {
    return {
      titulo: 'ATV',
      opened: false,
      togglePropio: '',
      gerentePlanificacion: [{ nombre: 'Valeria Bril', cargo: '' }],
      responsableArea: [{ nombre: 'Leticia Turco Greco', cargo: '' }],
      areaProduccion: [],
      proyectual: [],
      comercial: [],
      administracion: [],
      data: [],
      slider: [],
      loading: true,
    }
  },
  async fetch() {
    const url = `${this.$config.NUXT_PUBLIC_API_URL}/atv`
    try {
      const response = await this.$axios.$get(url)
      this.data = response.data
      // this.data.equipo = response.equipo
      this.data.gerencia = response.gerencia
      this.slider = response.slider
      this.responsableArea = response.equipo.personas
      this.gerentePlanificacion = response.equipo.planificacion
      this.areaProduccion = response.equipo.produccion
      this.comercial = response.equipo.comercial
      this.proyectual = response.equipo.proyectual
      this.administracion = response.equipo.administracion
    } catch (e) {}
    /* eslint-disable no-console */
  },
  mounted() {
    setTimeout(() => {
      this.loading = false
    }, 1300)
  },
  methods: {
    toggle() {
      this.opened = this.opened !== true
    },
    toggleEquipo(equipo) {
      this.togglePropio = equipo
    },
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
  transform: rotate(180deg);
  white-space: nowrap;
  writing-mode: vertical-lr;
  font-size: 4.2em;
  margin: 0;
}
h4 {
  color: #fff;
  transform: rotate(180deg);
  white-space: nowrap;
  writing-mode: vertical-lr;
  font-size: 3.5em;
  margin: 0 auto;
  text-align: center;
}
h4.inv {
  color: #fff;
  transform: rotate(-360deg);
  white-space: nowrap;
  writing-mode: vertical-lr;
  font-size: 3.5em;
  margin: 0 auto;
  text-align: center;
}
h2 {
  font-size: 4em;
  margin: 0;
}
.bloqueactivo {
  background-color: #606060;
  color: #fff !important;
}

@media (max-width: 1250px) {
  h4 {
    color: #fff;
    transform: none;
    white-space: nowrap;
    writing-mode: horizontal-tb;
    font-size: 2.5em;
    margin: 0 auto;
    text-align: left;
  }
  h4.inv {
    color: #fff;
    transform: none;
    white-space: nowrap;
    writing-mode: horizontal-tb;
    margin: 0 auto;
    font-size: 2.5em;
    text-align: left;
  }
  h1 {
    position: absolute;
    bottom: 3em;
    left: 22px;
    color: #fff;
    transform: none;
    white-space: nowrap;
    writing-mode: initial;
    font-size: 3em;
    margin: 0;
  }
}
.full-width-in-columns {
  display: block;
  width: 100%;
  column-span: all;
}
</style>
