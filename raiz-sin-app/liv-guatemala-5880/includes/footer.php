<footer class="site-footer">
    <div class="ed-container footer-top full no-padding" id="contact">
        <div class="ed-item row-small-2 ed-container">
            <div class="ed-item l-40 ed-container footer-logo">
                <div class="ed-item logo-footer">
                    <img class="img-responsive" src="assets/img/logo-footer.svg" />
                </div>
                <div class="ed-item footer-logos-footer only-desktop ed-container">
                    <div class="ed-item">
                        <img class="img-responsive atv-logo" src="assets/img/ATV-apellidos-verde.svg" />
                        <img class="img-responsive" src="assets/img/logo_ocampo.svg" />
                    </div>
                </div>
            </div>
            <div class="ed-item l-60 footer-desc">
                <h2 class="heading"><span class="light">VIVÍ TODAS LAS</span > <br>POSIBILIDADES.</h2><br>
                <p>Unidades pensadas para que vivas de forma descontracturada, y espacios que se adaptan
                     a los distintos momentos de tu vida. Un lugar para que vivas bien.
                </p>
                <p>Contactate con una nueva experiencia.</p>
                <div class="form-container">
                    <div id="message-mail"></div>
                   <form id="formulario" >
                        <div class="input input-fifty">
                            <div>
                                <input type="text" placeholder="Nombre y apellido" name="name" required/>
                            </div>
                            <div>
                                <input type="text" placeholder="Email" name="email" required/>
                            </div>
                        </div>
                        <div class="input input-fifty">
                            <div>
                                <input type="text" placeholder="Telefono" name="telefono" required />
                            </div>
                        </div>
                        <div class="input relative"><textarea rows="5" id="message-textarea" placeholder="Mensaje" name="message" required></textarea>
                        </div>
                        <div class="txtright relative">
                            <img class="loader" src="assets/img/ajax-loader.gif" alt="">
                            <button type="submit" class="button-submit btn">
                                Enviar
                                <img src="assets/img/arrow-left-submit.png" alt="">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer-logos mobile-tablet">
                <div class="logo-footer-mobile">
                    <img class="img-responsive" src="assets/img/logo-footer.svg" />
                </div>
                <div>
                    <img class="img-responsive" src="assets/img/ATV-apellidos-verde.svg" />
                    <img class="img-responsive" src="assets/img/logo_ocampo.svg" />
                </div>
            </div>
        </div>

    </div>
    <div class="footer-bottom ed-container full no-padding" id="contact">
        <div class="row-small-2 ed-item ed-container">
            <div class="ed-item s-90 m-70 copyright">
                <p><span>© <?php echo date('Y'); ?> ATV Arquitectos.</span> <span>Todos los derechos reservados.</span> <span class="negrita">Estudio Cornicelli</span></p>
            </div>
            <div class="ed-item s-10 m-30 social main-end">
                <ul>
                    <li><a target="_blank" href="https://www.facebook.com/ATV.arquitectos/" class="social-item"><?php echo file_get_contents("assets/img/facebook.svg"); ?></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/atvarquitectos/" class="social-item"><?php echo file_get_contents("assets/img/instagram.svg"); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_es.js"></script>

<script>
var form = $("#formulario");
var message = $("#message-mail");

form.validate({
submitHandler: function() {
    gtag('event', 'enviar', {
        'event_category': 'contacto',
        'event_label': 'formulario'
    });

    setTimeout($.ajax(
            {
                url : 'https://atvarquitectos.com/send.php',
                type: "POST",
                data : {
                    from: $('[name="email"]').val(),
                    fromName: $('[name="name"]').val(),
                    to: "info@atvarquitectos.com",
                    subject: "Consulta LIV GUATEMALA 5880",
                    message: "Nombre: "+ $('[name="name"]').val() +"<br> E-mail: "+ $('[name="email"]').val() + "<br> Telefono: "+ $('[name="telefono"]').val() + "<br> Mensaje: " + $('[name="message"]').val(),
					dta: btoa($('[name="name"]').val()+"//"+$('[name="email"]').val()+"//"+$('[name="telefono"]').val()+"//"+$('[name="message"]').val())
                },
                success:function(data, status, xhr)
                {
                    if (data == "success") {
                        message.html("<div class='alert alert-success'>Contacto enviado con éxito.</div>");
                        form[0].reset();
                    } else {
                        message.html("<div class='alert alert-danger'>Error al enviar el mensaje.");
                    }
                },
                error: function(err){
                    message.html("<div class='alert alert-danger'>Error al enviar el mensaje.");
                }
            }), 0);
}
});
</script>
