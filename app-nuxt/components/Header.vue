<template>
  <nav
    class="flex justify-between mx-auto w-full px-3 lg:px-8 fixed top-0"
    :class="
      tipo === 'interna'
        ? 'transition-all ease-in duration-800 interna ' + menuclass
        : 'transition-all  ' + menuclass
    "
    style="z-index: 500"
  >
    <div>
      <h3 class="text-2xl font-medium text-blue-500">
        <NuxtLink to="/">
          <img
            :src="logo"
            class="transition-all ease-in duration-800"
            :class="menuLogo"
          />
        </NuxtLink>
      </h3>
    </div>
    <div
      class="menuopen lg:space-x-6 w-full text-end lg:mt-2 relative"
      :class="menuOpen"
      @click="toggle"
    >
      <div
        class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:relative lg:space-x-6 lg:text-end lg:mt-2 lg:top-0 lg:right-0 lg:translate-0"
      >
        <NuxtLink
          v-for="item in menu"
          :key="item.link"
          :to="item.link"
          :class="tipo"
          >{{ item.text }}</NuxtLink
        >
      </div>
    </div>
    <div class="flex cursor-pointer pl-8 z-10" @click="toggle">
      <div class="h-8 w-8">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          :stroke="tipo === 'interna' ? '#ffffff' : '#969593'"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
          />
        </svg>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
  name: 'NuxtHeader',
  props: {
    tipo: {
      type: String,
      default: '',
    },
  },
  data: function () {
    return {
      menuOpen: 'hidden',
      menuOpenMobile: 'hidden',
      menuclass: ' py-8',
      menuLogo: 'logo',
      limitPosition: 100,
      menu: [],
    }
  },

  async fetch() {
    const url = `${this.$config.NUXT_PUBLIC_API_URL}/menu`
    try {
      const response = await this.$axios.$get(url)
      this.menu = response
    } catch (e) {}
    /* eslint-disable no-console */
  },
  computed: {
    logo: function () {
      if (this.tipo === 'interna') {
        return '/img/logo_atv.png'
      } else {
        return '/img/logo_gris_atv.png'
      }
    },
  },
  beforeMount() {
    window.addEventListener('scroll', this.handleScroll)
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll)
  },
  methods: {
    toggle: function () {
      if (this.menuOpen === 'hidden') {
        this.menuOpen = ''
        if (this.tipo === 'interna') {
          this.menuOpen = 'text-white'
        }
      } else {
        this.menuOpen = 'hidden'
      }
    },
    handleScroll() {
      let direction = 0
      if (
        this.lastPosition < window.scrollY &&
        this.limitPosition < window.scrollY
      ) {
        this.scrolled = true
        direction = 1 // up
      }

      if (this.lastPosition > window.scrollY) {
        this.scrolled = false
        direction = 2 // down
      }

      this.lastPosition = window.scrollY
      this.scrolled = window.scrollY > 250
      if (this.lastPosition === 0) {
        this.menuclass = ' py-8 '
        this.menuLogo = 'logo'
      } else {
        if (direction === 1) {
          this.menuclass = ' py-4 scrolling mt-[-100%]'
        } else {
          this.menuclass = ' py-4 scrolling mt-auto'
        }
        if (this.tipo === 'interna') {
          this.menuclass = this.menuclass + ' !bg-black/20'
        } else {
          this.menuclass = this.menuclass + '  !bg-white/70'
        }

        this.menuLogo = 'logo logochico'
      }
    },
  },
}
</script>
<style scoped>
.logo {
  width: 65px;
}
.logo.logochico {
  width: 37px;
}
a {
  color: #969593 !important;
}
a.interna {
  color: #fff !important;
}
@media (max-width: 1024px) {
  .menuopen a {
    display: block;
    width: 100%;
    text-align: center;
    padding-top: 15px;
    margin: 0;
    font-size: 1.5em;
    color: #fff !important;
  }
  .menuopen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: #bfbfbf;
    z-index: 10;
    padding-top: 40px;
  }
}
</style>
