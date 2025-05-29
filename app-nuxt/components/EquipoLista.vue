<template>
  <div>
    <div
      class="mb-4 border-b"
      :class="open ? 'border-gray-dark' : 'border-white'"
    >
      <p
        class="leading-none py-2 whitespace-pre-line"
        :class="open ? 'text-gray-dark' : 'text-white'"
      >
        {{ nombre }}
      </p>
    </div>
    <div v-if="open" class="border-gray-dark border-b pb-2">
      <div class="max-h-[60vh] overflow-y-auto">
        <div v-for="(item, index) in list" :key="index" class="mb-3">
          <p class="text-gray-dark leading-none">{{ item.nombre }}</p>
          <small class="text-gray-dark leading-none">{{ item.cargo }}</small>
        </div>
      </div>
    </div>
    <a
      class="cursor block w-[80px] relative ml-auto mr-0 text-sm rounded-full border px-2 py-1 mt-2 text-center"
      :class="open ? 'text-gray-dark border-gray-dark' : 'text-white'"
      @click="toggleOpen()"
    >
      <span v-if="open" class="block rotate-90">{{ '<' }}</span>
      <span v-else class="text-white">ver más</span>
    </a>
  </div>
</template>
<script>
export default {
  name: 'NuxtEquipoLista',
  props: {
    nombre: {
      type: String,
      default: 'w-full',
    },
    list: {
      type: Array,
      default: () => {
        return []
      },
    },
  },
  data: function () {
    return {
      open: false,
    }
  },
  methods: {
    toggleOpen() {
      if (this.open) {
        this.open = false
      } else {
        this.open = true
      }
    },
  },
}
</script>
