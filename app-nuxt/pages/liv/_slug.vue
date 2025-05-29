<template>
  <div>
    <section class="mt-[137px]">
      <div class="flex pb-8">
        <h1
          class="text-gray ml-4 leading-none pr-2 text-[2rem] lg:text-[4em] lg:whitespace-nowrap"
        >
          {{ data.nombre }}
        </h1>
        <div
          class="hidden lg:block w-full border-b-2 lg:border-b-4 border-gray"
        ></div>
      </div>
    </section>
    <section
      class="grid grid-cols-1 lg:grid-cols-3 lg:gap-16 mb-8 lg:mb-0 overflow-hidden w-full"
    >
      <component
        :is="component.type"
        v-for="component in data.comps"
        :key="component.name"
        v-bind="component.options"
      ></component>
    </section>
    <Close titulo="Liv." image="/img/close_liv.png" link="/liv"></Close>
  </div>
</template>
<script>
export default {
  //
  data: function () {
    return {
      data: [],
    }
  },
  async fetch() {
    const url = `${this.$config.NUXT_PUBLIC_API_URL}/proyecto?slug=${this.$route.params.slug}`
    try {
      const response = await this.$axios.$get(url)
      this.data = response.data
    } catch (e) {}
  },
}
</script>
<style scoped>
.imagenfull {
  background-size: cover;
  background-position: center;
}
</style>
