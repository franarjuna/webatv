<template>
  <div>
    <section>
      <div class="grid lg:grid-cols-3 gap-4 lg:gap-16">
        <component
          :is="component.type"
          v-for="(component, index) in comps"
          :key="index"
          v-bind="component.options"
        >
        </component>
      </div>
    </section>
    <Close
      titulo="Urbanismo."
      image="/img/urbanismo_bg.png"
      link="/urbanismo"
    ></Close>
  </div>
</template>
<script>
export default {
  name: 'ArquitecturaPage',
  components: {},
  layout: 'interna',

  data: function () {
    return {
      titulo: 'Arquitectura',
      image: '/img/portada_Arq.png',
      comps: [],
    }
  },
  async fetch() {
    const url = `${this.$config.NUXT_PUBLIC_API_URL}/page?p=/arquitectura`
    try {
      const data = await this.$axios.$get(url)
      this.comps = data.data.comps
    } catch (e) {}
    /* eslint-disable no-console */
  },
}
</script>
