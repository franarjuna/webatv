export { default as Citas } from '../..\\components\\3citas.vue'
export { default as Carousel } from '../..\\components\\Carousel.vue'
export { default as CenterSlider } from '../..\\components\\CenterSlider.vue'
export { default as Close } from '../..\\components\\Close.vue'
export { default as Columna } from '../..\\components\\Columna.vue'
export { default as Compartir } from '../..\\components\\Compartir.vue'
export { default as ContentSlider } from '../..\\components\\ContentSlider.vue'
export { default as CustomSlider } from '../..\\components\\CustomSlider.vue'
export { default as Damero } from '../..\\components\\Damero.vue'
export { default as Dialogo } from '../..\\components\\Dialogo.vue'
export { default as DobleTexto } from '../..\\components\\DobleTexto.vue'
export { default as Equipo } from '../..\\components\\Equipo.vue'
export { default as EquipoLista } from '../..\\components\\EquipoLista.vue'
export { default as Floatingbtn } from '../..\\components\\Floatingbtn.vue'
export { default as Footer } from '../..\\components\\Footer.vue'
export { default as Header } from '../..\\components\\Header.vue'
export { default as Imagen } from '../..\\components\\Imagen.vue'
export { default as ImagenFondo } from '../..\\components\\ImagenFondo.vue'
export { default as ImagenSlider } from '../..\\components\\ImagenSlider.vue'
export { default as LivBloque } from '../..\\components\\LivBloque.vue'
export { default as Loading } from '../..\\components\\Loading.vue'
export { default as Masonry } from '../..\\components\\Masonry.vue'
export { default as NuxtLogo } from '../..\\components\\NuxtLogo.vue'
export { default as ProjectInfo } from '../..\\components\\ProjectInfo.vue'
export { default as Proyecto3Bloques } from '../..\\components\\Proyecto3Bloques.vue'
export { default as Proyecto5Bloques } from '../..\\components\\Proyecto5Bloques.vue'
export { default as SensBloque } from '../..\\components\\SensBloque.vue'
export { default as Slider } from '../..\\components\\Slider.vue'
export { default as Texto } from '../..\\components\\Texto.vue'
export { default as TextoDestacado } from '../..\\components\\TextoDestacado.vue'
export { default as TextoFoto } from '../..\\components\\TextoFoto.vue'
export { default as TextoImagenDialogo } from '../..\\components\\TextoImagenDialogo.vue'
export { default as Tutorial } from '../..\\components\\Tutorial.vue'
export { default as Videon } from '../..\\components\\Videon.vue'

// nuxt/nuxt.js#8607
function wrapFunctional(options) {
  if (!options || !options.functional) {
    return options
  }

  const propKeys = Array.isArray(options.props) ? options.props : Object.keys(options.props || {})

  return {
    render(h) {
      const attrs = {}
      const props = {}

      for (const key in this.$attrs) {
        if (propKeys.includes(key)) {
          props[key] = this.$attrs[key]
        } else {
          attrs[key] = this.$attrs[key]
        }
      }

      return h(options, {
        on: this.$listeners,
        attrs,
        props,
        scopedSlots: this.$scopedSlots,
      }, this.$slots.default)
    }
  }
}
