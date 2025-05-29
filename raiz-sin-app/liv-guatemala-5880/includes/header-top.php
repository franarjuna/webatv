<header class="site-header header" role="banner">
    <div class="content-header">
        <div class="ed-container header-top full">
            <div class="ed-item s-40">
                <h1 class="logo">
                    <div class="img-logo"></div>
                </h1>
            </div>
            <div class="ed-item s-60 relative">
                <div class="txtright">
        							<a class="tel btn" href="tel:+5491140960600">+5411 4096 0600&nbsp;&nbsp;<?php echo file_get_contents("./assets/img/phone.svg"); ?></a>
        							<?php /*<a class="" href="https://wa.me/5491151745074?text=Hola. Quisiera recibir más información sobre Liv Guatemala 5880" target="_blank" style="float:right;margin-left: 20px;"><img src="https://img.icons8.com/color/300/000000/whatsapp.png" style="width:40px;"/></a>*/?>
                </div>
                <nav class="main-nav" id="main-nav">
                    <ul class="main-menu" id="main-menu">
                        <li ><a class="goto" data-goto="unidades" href="#unidades">Unidades</a></li>
                        <li ><a class="goto" data-goto="ubicacion" href="#ubicacion">Ubicación</a></li>
                        <li ><a class="logo-360" data-urlview="360/#pano147" data-goto="360view" href="#">Imágenes / 360°</a></li>
                        <li ><a class="goto" data-goto="contact" href="#contact">Contacto</a></li>
                    </ul>
                </nav>
                <div class="container-navtoggle">
                    <div class=" nav-toggle" id="main-nav-toggle"></div>
                </div>
            </div>
        </div>
        <div class="text-video" id="text-video">
            <div >
                <h2 class="uppercase"><span class="book">Viví en equilibrio,<br>Viví Liv.</span></h2>
                <p>
                   Viví la satisfacción de llegar a tu casa atravesando<br>
                   espacios llenos de luz, aire y tranquilidad.
                </p>
                <div>
                    <button  class="btn goto" data-goto="unidades" href="#unidades">
                    <span>Unidades</span> &nbsp;&nbsp;&nbsp; <?php echo file_get_contents('assets/img/arrow-down.svg'); ?>
                    </button>
                </div>
            </div>
        </div>

    </div>
    <a class="button-scroll" href="http://atvarquitectos.com" target="_blank">
        <img src="assets/img/logo-atv-flotante.svg" alt="">
    </a>
    <div class="header-video">
       <?php require('video.php'); ?>
    </div>
</header><!-- .site-header -->
