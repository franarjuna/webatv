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
    <Close titulo="Sens." image="/img/fondo-azul.png" link="/sens"></Close>
  </div>
</template>
<script>
export default {
  name: 'LivPage',
  components: {},
  layout: 'interna',

  data: function () {
    return {
      comps: [],
    }
  },
  async fetch() {
    const url = `${this.$config.NUXT_PUBLIC_API_URL}/page?p=/liv`
    try {
      const data = await this.$axios.$get(url)
      this.comps = data.data.comps
    } catch (e) {}
    /* eslint-disable no-console */
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
  bottom: 1em;
  color: #fff;
  transform: rotate(180deg);
  white-space: nowrap;
  writing-mode: vertical-lr;
  font-size: 2em;
  margin: 0;
}
@media (min-width: 760px) {
  h1 {
    position: absolute;
    bottom: 2.5em;
    color: #fff;
    transform: rotate(180deg);
    white-space: nowrap;
    writing-mode: vertical-lr;
    font-size: 3.5em;
    margin: 0;
  }
}
</style>
