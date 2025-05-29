<template>
  <div v-if="images !== null" class="relative overflow-hidden">
    <transition-group name="fade" tag="div" class="flex gap-16" :style="moveStyle">
        <img v-for="i in images" :ref="i" :key="i" :src="i" :class="i === currentImg ? 'activa' : ''" />
    </transition-group>
    <a class="prev" href="#" @click.prevent="prev">&#10094; </a>
    <a class="next" href="#" @click.prevent="next">&#10095; </a>
  </div>
</template>
<script>
export default {
  name: "NuxtCustomSlider",
  data() {
    return {
      images: [
        "/img/slideatv/slide1.png",
        "/img/slideatv/slide2.png",
        "/img/slideatv/slide3.png",
        "/img/slideatv/slide4.png"
      ],
      timer: null,
      currentIndex: 0
    };
  },

  computed: {
    currentImg: function() {
      // const myImg = this.$refs[this.images[Math.abs(this.currentIndex) % this.images.length]]
      return this.images[Math.abs(this.currentIndex) % this.images.length];
    },
    moveStyle: function() {
      const valor = -10
      // const width = window.innerWidth

      return `margin-left:${valor}px`
    }
  },

  mounted: function() {
    this.startSlide();
  },

  methods: {
    startSlide: function() {
      // this.timer = setInterval(this.next, 4000);
    },

    next: function() {
      this.currentIndex += 1;
    },
    prev: function() {
      this.currentIndex -= 1;
    }
  }
};
</script>
<style scoped>

.fade-enter-active,
.fade-leave-active {
  transition: all 0.9s ease;
  overflow: hidden;
  visibility: visible;
  position: absolute;
  width:100%;
  opacity: 1;
}

.fade-enter,
.fade-leave-to {
  visibility: hidden;
  width:100%;
  opacity: 0.5;
}

img.activa {
  opacity: 1;
}
img {
  opacity: 0.3;
  height:600px;
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.7s ease;
  border-radius: 0 4px 4px 0;
  text-decoration: none;
  user-select: none;
}

.next {
  right: 0;
}

.prev {
  left: 0;
}
</style>
