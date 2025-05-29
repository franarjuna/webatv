<template>
  <div>
    <section class="contacto relative">
        <h1 class="hidden lg:block ">{{ titulo }}</h1>
        <!--<div class="relative px-8 py-8 mx-auto w-full"></div>-->
        <div class="absolute w-4/5 lg:w-1/3 top-2/4 left-2/4 form -translate-y-1/2 -translate-x-1/2 ">
          <form id="contactForm" class="mt-8 lg:mt-0" @submit.prevent="sendContacto">
            <input v-model="form.nombre" name="Nombre" placeholder="Nombre" type="text" required  />
            <input v-model="form.apellido" name="Apellido" placeholder="Apellido" type="text" required  />
            <input v-model="form.email" name="Email" placeholder="Email" type="email" required />
            <input v-model="form.telefono" name="Telefono" placeholder="Telefono" type="tel"/>
            <input v-model="form.mensaje" name="Mensaje" placeholder="Mensaje" type="text"/>
            <div class="text-white">{{ errores }}</div>
            <div class="mt-12 lg:flex lg:justify-between">
              <button>enviar</button>
              <div class="flex space-x-6 mt-8 lg:mt-0">
                <a class="text-white underline" href="https://www.instagram.com/atvarquitectos/" target="_blank">Instagram</a>
                <a class="text-white underline " href="https://www.linkedin.com/company/atv-arquitectos/" target="_blank">Linkedin</a>
                <a class="text-white underline " href="mailto:rrhh@atvarquitectos.com.ar">Trabaja con nosotros</a>
              </div>
            </div>
          </form>
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
      errores:'',
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
    async sendContacto(e){

      const mensaje = "Nombre: "+ this.form.apellido + " " + this.form.nombre +"<br> E-mail: "+ this.form.email + "<br> Telefono: "+ this.form.telefono + "<br> Mensaje: " + this.form.mensaje

      const dataForm = {
        from: this.form.email,
        fromName: this.form.apellido + " " + this.form.nombre,
        to: "info@atvarquitectos.com",
        subject: "Consulta ATV Arquitectos",
        message: mensaje
      }

      try {

        const response = await this.$axios.post('https://www.atvarquitectos.com/send.php', dataForm)
        if (response.status === 200) {
          this.$router.push("/gracias")

        } else {
          this.errores = `Unexpected response status: ${response.status}`;
        }
      } catch (error) {
        if (error.response) {
          // The request was made and the server responded with a status code
          // that falls out of the range of 2xx
          console.error('Error response:', error.response.data);
          this.errores = `Error: ${error.response.data.message || error.response.status}`;
        } else if (error.request) {
          // The request was made but no response was received
          console.error('No response received:', error.request);
          this.errores = 'Network error: No response received from the server.';
        } else {
          // Something happened in setting up the request that triggered an Error
          console.error('Error setting up request:', error.message);
          this.errores = `Request error: ${error.message}`;
        }
      }

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
