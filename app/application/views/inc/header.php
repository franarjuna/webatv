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
<title>Sens Palermo Green</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,700&family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
<script src="//kit.fontawesome.com/bb33af9656.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css?t=<?php echo time();?>" >
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animations.css?t=<?php echo time();?>" >
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-57334305-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-57334305-1');
</script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '533855477555163');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=533855477555163&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
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
        <div class="floatwhat">
            <a href="https://wa.me/5491140960600" target="_blank">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 182.3 182.3" style="enable-background:new 0 0 182.3 182.3;" xml:space="preserve">
<style type="text/css">
	.whatsappci{fill-rule:evenodd;clip-rule:evenodd;fill:#00F379;}
	.whatsapplog{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
</style>
<circle class="whatsappci" cx="91.15" cy="91.15" r="91.15"/>
<g id="WA_Logo">
	<g>
		<path class="whatsapplog" d="M121.43,60.9c-8.08-8.09-18.83-12.55-30.28-12.55c-23.59,0-42.8,19.2-42.8,42.8c0,7.54,1.97,14.91,5.71,21.4
			l-6.07,22.18l22.69-5.95c6.25,3.41,13.29,5.21,20.46,5.21h0.02c0,0,0,0,0,0c23.59,0,42.79-19.2,42.8-42.8
			C133.96,79.75,129.51,68.99,121.43,60.9z M91.15,126.76h-0.01c-6.38,0-12.65-1.72-18.11-4.96l-1.3-0.77l-13.47,3.53l3.59-13.13
			l-0.85-1.35c-3.56-5.66-5.44-12.21-5.44-18.93c0.01-19.62,15.97-35.57,35.59-35.57c9.5,0,18.44,3.71,25.15,10.43
			c6.72,6.72,10.41,15.66,10.41,25.17C126.72,110.8,110.76,126.76,91.15,126.76z M110.67,100.11c-1.07-0.54-6.33-3.12-7.31-3.48
			c-0.98-0.36-1.69-0.54-2.41,0.54c-0.71,1.07-2.76,3.48-3.39,4.19c-0.62,0.71-1.25,0.8-2.32,0.27c-1.07-0.54-4.52-1.66-8.6-5.31
			c-3.18-2.84-5.33-6.34-5.95-7.41c-0.62-1.07-0.07-1.65,0.47-2.18c0.48-0.48,1.07-1.25,1.6-1.87c0.53-0.62,0.71-1.07,1.07-1.78
			c0.36-0.71,0.18-1.34-0.09-1.87c-0.27-0.54-2.41-5.8-3.3-7.94c-0.87-2.09-1.75-1.8-2.41-1.84c-0.62-0.03-1.34-0.04-2.05-0.04
			s-1.87,0.27-2.85,1.34c-0.98,1.07-3.74,3.66-3.74,8.92c0,5.26,3.83,10.35,4.37,11.06c0.53,0.71,7.54,11.52,18.27,16.15
			c2.55,1.1,4.54,1.76,6.1,2.25c2.56,0.81,4.89,0.7,6.74,0.42c2.05-0.31,6.33-2.59,7.22-5.09c0.89-2.5,0.89-4.64,0.62-5.09
			C112.45,100.91,111.74,100.65,110.67,100.11z"/>
	</g>
</g>
</svg></a>
        </div>