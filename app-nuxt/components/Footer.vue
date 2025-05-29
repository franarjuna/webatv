<template>
  <footer class="pt-12 pb-18 px-3 lg:px-8 relative">
    <div class="lg:flex justify-between mt-16 mb-16 max-w-screen-xl mx-auto">
      <div class="w-full lg:w-1/3 mb-8">
        <p class="text-white text-md lg:text-lg h-28">
          <span class="text-white inline-block w-24">Email.</span
          ><a href="mailto:info@atvarquitectos.com">info@atvarquitectos.com</a><br />
          <span class="text-white inline-block w-24">Tel.</span><a href="tel:541148907070">+54 11 4890
          7070</a><br />
          <span class="text-white inline-block w-24">Whatsapp.</span><a href="https://api.whatsapp.com/send/?phone=5491140960600" target="_blank">+54 11 4096
          0600</a><br /><br />
        </p>
        <div class=" space-x-3 mt-1 hidden lg:flex">
          <div><a href="https://www.instagram.com/atvarquitectos/" target="_blank"><img src="~/static/img/instagram.png" class="h-5" /></a></div>
          <div><a href="https://www.linkedin.com/company/atv-arquitectos/" target="_blank"><img src="~/static/img/linkedin.png" class="h-5" /></a></div>
          <div><a href="https://api.whatsapp.com/send/?phone=5491140960600" target="_blank"><img src="~/static/img/whatsapp.png" class="h-5" /></a></div>
        </div>
      </div>
      <div class="w-full lg:w-1/3 hidden lg:block">
        <div class="h-28">
          <form
            action="https://atvarquitectos.us8.list-manage.com/subscribe/post?u=c6b8435f894bad2a5561397db&amp;id=89841da699"
            method="post"
            target="_blank"
            data-form-type="newsletter"
          >
            <div class="lg:flex w-full lg:w-[300px]">
              <label class="text-white text-md lg:text-lg pr-2 my-2"
                >Newsletter.</label
              >
              <input
                type="email"
                value=""
                name="EMAIL"
                required
                class="w-full border-0 border-b-2 border-white bg-transparent text-white placeholder-white py-1"
                placeholder="Email"
              />
            </div>
            <div class="text-end max-w-sm w-full lg:w-[300px]">
              <button class="text-white text-xs">Enviar</button>
            </div>
          </form>
        </div>
        <img src="~/static/img/certificacion_footer.png" class="w-full lg:w-[300px]" />
      </div>
      <div class="w-full lg:w-1/3">
        <p class="text-white text-md lg:text-lg h-20 lg:h-28">
          <a href="https://maps.app.goo.gl/khiRqSz6BSNYKGq19" target="_blank">Gorriti 6046 Of. 802</a>_ c1414BKN<br />Ciudad Autónoma de Buenos Aires
        </p>
        <p class="text-white text-md lg:text-lg hidden lg:block"><a href="mailto:rrhh@atvarquitectos.com.ar">Trabaja con nosotros.</a></p>
        <p class="text-white text-md lg:text-lg">Todos los derechos reservados. <br />ATV Arquitectos.</p>
      </div>
    </div>
    <img
      src="~/static/img/go_to_top.png"
      class="absolute block top-0 left-2/4 -translate-y-2/4 -translate-x-2/4 w-10 cursor-pointer"
      @click="gototop"
    />
  </footer>
</template>
<script>
export default {
  name: 'NuxtFooter',
  methods: {
    gototop() {
      window.scrollTo({ top: 0, behavior: 'smooth'   })
    },
  },
}
</script>
<style scoped>
footer {
  background-color: #969593;
  padding-top: 0.5em;
  padding-bottom: 0.5em;
}
</style>
