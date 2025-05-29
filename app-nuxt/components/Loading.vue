<!-- components/Loading.vue -->
<template>
  <div v-if="visible" class="loading-container">
    <div class="spinner" :style="{ borderColor: color }"></div>
    <p v-if="text">{{ text }}</p>
  </div>
</template>

<script>
export default {
  name: 'LoadingNuxt',
  props: {
    visible: {
      type: Boolean,
      default: true,
    },
    text: {
      type: String,
      default: 'Loading...',
    },
    color: {
      type: String,
      default: '#00c58e', // Default color for the spinner
    },
  },
}
</script>

<style scoped>
.loading-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: rgba(255, 255, 255, 0.8);
  z-index: 999;
}

.spinner {
  width: 40px;
  height: 40px;
  border: 4px solid;
  border-radius: 50%;
  border-top-color: transparent;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
