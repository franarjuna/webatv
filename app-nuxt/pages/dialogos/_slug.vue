<template>
  <div>
    <div class="header-dialogo">
      <div class="max-w-screen-xl mx-auto block lg:flex justify-between">
        <div class="w-full">
          <h2
            class="text-xxxxl text-gray-700 mb-4 w-full lg:w-1/2 p-8 lg:p-0 leading-none"
          >
            {{ data.titulo }}
          </h2>
          <p
            v-if="data.subtitle !== ''"
            class="text-xl text-gray-700 w-1/2 leading-none"
          >
            {{ data.subtitle }}
          </p>
        </div>
        <div
          class="block w-fit rounded-full px-4 py-1 bg-white text-gray-dark h-fit m-8 lg:m-0"
        >
          {{ data.categoria }}
        </div>
      </div>
    </div>
    <img
      v-if="data.imagen !== ''"
      :src="data.imagen"
      class="w-full"
      :alt="data.titulo"
    />

    <div
      class="max-w-screen-xl mx-auto block lg:flex justify-between lg:py-8 px-8 py-4"
    >
      <ul class="w-fit">
        <li class="lg:inline mr-4">Publicación__{{ data.fecha }}</li>
        <li class="lg:inline">Autor/a__{{ data.autor }}</li>
      </ul>

      <compartir />
    </div>
    <div class="contenido max-w-screen-xl mx-auto my-4 lg:my-16">
      <component
        :is="component.type"
        v-for="component in data.contenido"
        :key="component.name"
        v-bind="component.options"
      ></component>
    </div>
    <div
      class="border-y-2 border-gray-200 max-w-screen-xl mx-auto flex justify-between p-4"
    >
      <ul class="w-fit">
        <li class="inline mr-4">Publicación__{{ data.fecha }}</li>
        <li class="inline">Autor/a__{{ data.autor }}</li>
      </ul>
      <div class="flex gap-2">
        <div class="block w-fit rounded-full px-4 py-1 bg-gray-dark text-white">
          {{ data.categoria }}
        </div>
        <compartir />
      </div>
    </div>

    <div
      class="grid grid-cols-1 lg:grid-cols-3 gap-x-0 gap-y-4 lg:gap-16 mb-16"
    >
      <div
        v-for="item in items"
        :key="item.id"
        class="relative bg-gray-bgs h-[70vh]"
      >
        <dialogo :item="item"></dialogo>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  //
  data: function () {
    return {
      data: {},
      items: [],
    }
  },
  async fetch() {
    const url = `${this.$config.NUXT_PUBLIC_API_URL}/dialogo?slug=${this.$route.params.slug}`
    try {
      const response = await this.$axios.$get(url)
      this.data = response.data
    } catch (e) {}
    try {
      const response = await this.$axios.$get(
        `${this.$config.NUXT_PUBLIC_API_URL}/dialogos?limit=3`
      )
      this.items = response.data
    } catch (e) {}
  },
  head() {
    return {
      title: this.title,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        {
          hid: 'description',
          name: 'description',
          content: this.description,
        },
      ],
    }
  },
  computed: {
    title() {
      let titleBase = this.data.titulo ?? ''
      if (this.data.seo_title !== undefined) {
        titleBase = this.data.seo_title
      }
      titleBase = titleBase + ' - Dialogos - ATV Arquitectos'
      return titleBase
    },
    description() {
      let titleBase = this.data.titulo ?? ''
      if (this.data.seo_title !== undefined) {
        titleBase = this.data.seo_description
      }
      return titleBase
    },
  },
}
</script>
<style scoped>
.header-dialogo {
  @apply pt-48 pb-20;
  background-color: #e1e0dc;
}
</style>
