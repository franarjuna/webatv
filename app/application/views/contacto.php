<?php 
$nofloatinglogo = 1;
$headeractivo = 1;
?>
<?php include("inc/header.php");?>
<section id="contactosection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                <p>Para seguir recorriendo Sens Palermo Green y profundizar sobre esta nueva forma de habitar la ciudad, deje sus datos y nos pondremos en contacto.</p>
                <p class="equipo"></p>
                <form class="contactform" id="formulario">
                    <div class="form-group">
                        <label>Nombre y Apellido</label>
                        <input name="name" type="text" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input name="telefono" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Mensaje</label>
                        <textarea name="message" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <button>Enviar</button>
                    </div> 
                    <div id="message-mail"></div>
                </form>
                <div class="logoscontacto">
                    Proyecto · Direccion · Desarrollo <br> <br>                   
                    <a href="https://atvarquitectos.com"><img src="<?php echo base_url();?>assets/img/atv-contacto.png" alt="ATV"></a>
                </div>
                <div class="logoscontacto">
                    Comercializa<br><br> 
                    <img src="<?php echo base_url();?>assets/img/ocampo-contacto.png" alt="Ocampo">
                </div>
                <div class="logoscontacto">
                    Codesarrollo<br><br> 
                    <img src="<?php echo base_url();?>assets/img/fourdevelopers-contacto.png" alt="Four Developers">
                </div>
            </div>
            <div class="col-md-6">
            <?php echo '<div id="map" style="width:100%;height:100%;"></div>'; $haymapa = 1; ?>
            </div>
        </div>
    </div>
</section>
<?php include("inc/footer.php");?>