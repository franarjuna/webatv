<template>
  <div>
    <section class="contacto relative">
        <h1 class="hidden lg:block ">{{ titulo }}</h1>
        <!--<div class="relative px-8 py-8 mx-auto w-full"></div>-->
        <div class="absolute w-4/5 lg:w-1/3 top-2/4 left-2/4 form -translate-y-1/2 -translate-x-1/2 ">
          <p class="text-xxl text-white">Muchas gracias por su mensaje.</p>
        </div>
    </section>
    <Close
      titulo="Equipo."
      image="/img/equipo.png"
      :nomargin="true"
      link="/atv"
    ></Close>
  </div>
</template>
<script>
export default {
  name: 'ContactoPage',
  components: {  },
  layout: 'interna',


  data: function () {
    return {
      titulo: 'CONTACTO.',
      form:{
        nombre: "",
        apellido: "",
        email: "",
        telefono: "",
        mensaje: ""
      }
    }
  },
  methods: {
    sendContacto(){

    }
  }
}
</script>

<style lang="postcss">
#contactForm {
  input{
    @apply text-white appearance-none placeholder-gray-100 bg-transparent border-b-white border-b-2 w-full  mt-6 py-1 px-2 leading-loose focus:outline-none relative
  }
  button{
    @apply text-white text-sm rounded-full border px-3 py-1 w-fit
  }
}
.contacto {
  background:#BFBFBF;
  height: 85vh;
}

h1 {
  position: absolute;
  bottom: 3em;
  left: 22px;
  color: #fff;
  transform: rotate(-90deg);
  transform-origin: bottom;
  white-space: nowrap;
  writing-mode: vertical-lr;
  font-size: 4.2em;
  margin: 0;
}

@media (min-width: 760px) {
  h1 {
    position: absolute;
    bottom: 1em;
    color: #fff;
    transform: rotate(180deg);
    transform-origin: initial;
    white-space: nowrap;
    writing-mode: vertical-lr;
    font-size: 3.5em;
    margin: 0;
  }
}
</style>
