<template>
  <div>
    <div class="hero w-full relative">
      <div
        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center"
      >
        <h1 class="text-white">PUBLICACIONES.</h1>
        <h2 class="text-white">
          La intersección entre la arquitectura y lorem ipsum
        </h2>
      </div>
    </div>
    <div class="w-full overflow-hidden" style="background-color: #e1e0dc">
      <div class="max-w-screen-xl mx-auto py-16">
        <h2 class="text-2xl text-gray-700">{{ data.titulo }}</h2>
      </div>
      <center-slider :slides="data.slider"></center-slider>
    </div>
    <div class="max-w-screen-xl mx-auto flex py-16 gap-8">
      <div class="w-1/2 text-gray-700" style="white-space: pre-line">
        {{ data.contenido }}
      </div>
      <div class="w-1/2">
        <div class="w-3/4 mx-auto">
          <h3 class="border-y-[1px] py-2">ESCRITORES</h3>
          <p class="py-2">{{ data.autores }}</p>
          <h3 class="border-y-[1px] py-2">AÑO DE PUBLICACIÓN</h3>
          <p class="py-2">{{ data.anio }}</p>
          <h3 class="border-y-[1px] py-2">¿DÓNDE ADQUIRIRLO?</h3>
          <p class="border-b-[1px] py-2">{{ data.donde_comprar }}</p>
        </div>
      </div>
    </div>
    <div class="newsletter w-100 py-40 bg-cover">
      <div class="max-w-screen-xl mx-auto flex justify-between">
        <div class="w-1/3">
          <h3 class="text-gray-dark text-xxxl mb-4">Newsletter</h3>
          <p class="text-gray-dark text-xl">
            ¿Querés estar al tanto de todas las novedades? Suscribite
          </p>
        </div>
        <div class="w-1/2 mr-8">
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
                class="w-full border-0 border-b-2 border-gray-dark bg-transparent text-gray-dark placeholder-gray-dark py-1"
                placeholder="Email"
              />
            </div>
            <div class="text-end w-full">
              <button class="text-gray-dark text-sm">Enviar</button>
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
import CenterSlider from '~/components/CenterSlider.vue'
export default {
  name: 'PublicacionesPage',
  components: { CenterSlider },
  layout: 'interna',
  data: function () {
    return {
      data: [],
      items: [],
    }
  },
  async fetch() {
    const url = `${this.$config.NUXT_PUBLIC_API_URL}/publicacion?slug=${this.$route.params.slug}`
    try {
      const response = await this.$axios.$get(url)
      this.data = response.data
    } catch (e) {}
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
</style>
