<?php
 $urls=array(
     "home" => base_url(),
     "proyecto" => base_url()."proyecto",
     "ubicacion" => base_url()."ubicacion",
     "openers" => base_url()."openers",
     "opener" => base_url()."opener",
     "genesis" => base_url()."atvarquitectos",
     "equipo" => base_url()."equipo",
     "contacto" => base_url()."contacto",
     "galeria" => base_url()."galeria",
     "amenities" => base_url()."amenities",
     "unidades" => base_url()."unidades",
     "vision" => base_url()."vision",
     "curaduria" => base_url()."curaduria",
     "well" => base_url()."well"
 );
 
?>
<!DOCTYPE html>
<head>
<title>SENS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,700&family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
<script src="//kit.fontawesome.com/bb33af9656.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css?t=<?php echo time();?>" >
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animations.css?t=<?php echo time();?>" >
</head>
<body>
    <div id="header" <?php echo (isset($headeractivo))?'class="active activofijo"':'';?>>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <a href="<?php echo $urls['home'];?>">
                    <img src="<?php echo base_url();?>assets/img/logo.png" class="mainlogo">
                    <img src="<?php echo base_url();?>assets/img/logomobile.png" class="mainlogomobile">
                </a>
            </div>
            <div class="col-6 text-right">
                <div class="navbars"><span></span><span></span><span></span></div>
                <div class="navmenu">
                    <ul>
                        <li><a href="<?php echo $urls['proyecto'];?>">Proyecto</a></li>
                        <li><a href="<?php echo $urls['unidades'];?>">Unidades</a></li>
                        <li><a href="<?php echo $urls['galeria'];?>">Galería</a></li>
                        <li><a href="<?php echo $urls['genesis'];?>">ATV Arquitectos</a></li>
                        <li><a href="<?php echo $urls['contacto'];?>">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php if(!isset($nofloatinglogo)){?>
    <div class="floatatvlogo"><a href="https://atvarquitectos.com/" target="_blank"></a></div>
    <?php }?>
