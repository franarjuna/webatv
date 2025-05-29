<template>
  <div>
    <imagen-fondo :h1="titulo" :imagen="image" :texto="texto" />
    <section class="grid grid-cols-2 gap-16 mt-8">
      <div class="col">
        <component
        :is="component.type"
        v-for="(component,index) in comps.col1"
        :key="index"
        v-bind="component.options"
      ></component>
      </div>
      <div class="col">
        <component
        :is="component.type"
        v-for="(component,index) in comps.col2"
        :key="index"
        v-bind="component.options"
      ></component>
      </div>
    </section>
    <Close
      titulo="Arquitectura."
      image="/img/bgarquitectura.png"
      link="/arquitectura"
      :nomargin="true"
    ></Close>
  </div>
</template>
<script>
export default {
  name: 'BienestarPage',
  components: {},
  layout: 'interna',

  data: function () {
    return {
      titulo: 'BIENESTAR.',
      image: '/img/bgbienestar.png',
      texto: 'ATV crea espacios\nque nos conectan con  los sentidos\nun nuevo modo de vincularse con la ciudad',
      comps: [],
    }
  },
  async fetch() {
    const url = `https://app.atvarquitectos.com/ap/bienestar.json`

    // this.data = await this.$axios.$get(url)
    try {
      const data = await this.$axios.$get(url)
      this.comps = data.comps
    } catch (e) {}
    /* eslint-disable no-console */
  },
}
</script>
<style scoped>
h1 {
  position: absolute;
  bottom: 3em;
  left:22px;
  color: #fff;
  transform: rotate(180deg);
  white-space: nowrap;
  writing-mode: vertical-lr;
  font-size: 4.2em;
  margin: 0;
}
</style>
