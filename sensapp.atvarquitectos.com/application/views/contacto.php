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
                <?php /* <ul>
                    <li><a><i class="fab fa-instagram"></i> Sens Palermo Green</a></li>
                    <li><a><i class="fab fa-whatsapp"></i> 113 348 3356</a></li>
                </ul>*/?>
                <p class="equipo"></p>
                <form class="contactform">
                    <div class="form-group">
                        <label>Nombre y Apellido</label>
                        <input type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Mensaje</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <button>Enviar</button>
                    </div>
                </form>
                <div class="logoscontacto">
                    Proyecto · Direccion · Desarrollo <br> <br>                   
                    <a href="https://atvarquitectos.com"><img src="/assets/img/atv-contacto.png" alt="ATV"></a>
                </div>
                <div class="logoscontacto">
                    Comercializa<br><br> 
                    <img src="/assets/img/ocampo-contacto.png" alt="Ocampo">
                </div>
                <div class="logoscontacto">
                    Codesarrollo<br><br> 
                    <img src="/assets/img/fourdevelopers-contacto.png" alt="Four Developers">
                </div>
            </div>
            <div class="col-md-6">
            <?php echo '<div id="map" style="width:100%;height:100%;"></div>'; $haymapa = 1; ?>
            </div>
            <?php /*<div class="col-12 col-md-6">
                <form class="contactform">
                    <div class="form-group">
                        <label>Nombre y Apellido</label>
                        <input type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Mensaje</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <button>Enviar</button>
                    </div>
                </form>
            </div>*/?>
        </div>
        <?php /*<div class="row desarrolloyarq mb-5">
            <div class="col-md-6">
                
                <div class="logoscontacto">
                    Proyecto · Direccion · Desarrollo <br> <br>                   
                    <img src="/assets/img/atv-contacto.png" alt="ATV">
                </div>
                <div class="logoscontacto">
                    Comercializa<br><br> 
                    <img src="/assets/img/ocampo-contacto.png" alt="Ocampo">
                </div>
                <div class="logoscontacto">
                    Codesarrollo<br><br> 
                    <img src="/assets/img/fourdevelopers-contacto.png" alt="Four Developers">
                </div>
            </div>
        </div>*/?>
    </div>
</section>
<?php include("inc/footer.php");?>