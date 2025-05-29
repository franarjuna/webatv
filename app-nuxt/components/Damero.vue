<template>
  <section class="px-3 lg:px-12 max-w-screen-xl mx-auto pb-3 lg:pb-16">
    <div class="lg:columns-2 gap-2 lg:gap-16">
      <div v-for="block in blocks" :key="block.id" class="w-full break-inside damero">
        <h3 class="text-lg lg:text-[2em] pt-8 lg:pt-16">{{ block.title }}</h3>
        <p class="text-sm my-2 w-1/2">{{ block.text }}</p>
        <a
          v-if="block.link !== ''"
          class="text-md block lg:my-4 rounded-full border px-4 py-1 w-fit my-2"
          :href="block.link"
          >ver más</a
        >
        <img :src="block.image" class="w-4/5" />
      </div>
    </div>
  </section>
</template>
<script>
export default {
  name: 'NuxtDamero',
  props: {
    blocks: {
      type: Array,
      default: null,
    },
  },
  data: function () {
    return {}
  },
}
</script>

<style scoped>
.imagenfull {
  background-size: cover;
  background-position: center;
}
.break-inside {
  break-inside: avoid;
}
@media (max-width: 760px) {
  .damero:nth-of-type(2n) img,
  .damero:nth-of-type(2n) a,
  .damero:nth-of-type(2n) h3,
  .damero:nth-of-type(2n) p{
    text-align: right;
    margin-right: 0;
    margin-left: auto;
  }
}
</style>
