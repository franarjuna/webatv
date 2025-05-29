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
    <Close
      titulo="Bienestar."
      image="/img/bienestar_bg.png"
      link="/bienestar"
    ></Close>
  </div>
</template>
<script>
export default {
  name: 'UrbanismoPage',
  components: {},
  layout: 'interna',

  data: function () {
    return {
      titulo: 'Urbanismo',
      image: '/img/urbanismo_bg.png',
      comps: [],
    }
  },
  async fetch() {
    const url = `${this.$config.NUXT_PUBLIC_API_URL}/page?p=/urbanismo`
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
  bottom: 3em;
  left: 22px;
  color: #fff;
  transform: rotate(180deg);
  white-space: nowrap;
  writing-mode: vertical-lr;
  font-size: 4.2em;
  margin: 0;
}
</style>
