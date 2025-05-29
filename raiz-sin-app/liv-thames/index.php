<?php require("../tagsession.php"); ?>
<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="es-ES" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon-atv.png"/>
	<title><?php echo SITE_TITLE; ?></title>
	<meta name="AUTHOR" content="ATV Arquitectos">
	<meta content="all" name="robots">
	<meta property="og:url" content="http://atvarquitectos.com/liv-thames/">

	<meta property="og:title" content="Liv Thames.">
	<meta property="og:image" content="assets/img/fb-img.jpg">
	<meta property="og:type"   content="website" />
	<meta property="og:description" content="Descubrí LIV Thames; amplios lofts desde los 60 a los 200 m2 con espacios amplios, luminosos y con terrazas con césped. Espacios pensados para vivir bien, trabajar y crecer">
    <meta name="description" content="Descubrí LIV Thames; amplios lofts desde los 60 a los 200 m2 con espacios amplios, luminosos y con terrazas con césped. Espacios pensados para vivir bien, trabajar y crecer">
	<meta name="keywords" content="palermo hollywood, palermo soho, palermo, venta, departamento, loft, estudio, oficina, emprendimiento, inversión, desarrollo, departamento en pozo, fideicomiso, atv arquitectos, dos ambientes, tres ambientes, terrazas, parrilla, piscina, calidad, amenities, modernos, diseño integral, real estate, casas en altura">
	<link rel='stylesheet' href='assets/css/landing-live.css' type='text/css' />
	<link rel='stylesheet' href='assets/css/video.css?v=0.2' type='text/css' />
	<script type='text/javascript' src='assets/js/jquery-3.3.1.min.js'></script>
	<script type='text/javascript' src='assets/js/departamentos-3.js'></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-57334305-5"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-57334305-5');
</script>


	<!-- Global site tag (gtag.js) - Google Ads: 798034477 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-798034477"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'AW-798034477');
	</script>

	<script>
	function gtag_report_conversion(url) {
	  var callback = function () {
	    if (typeof(url) != 'undefined') {
	      window.location = url;
	    }
	  };
	  gtag('event', 'conversion', {
	      'send_to': 'AW-798034477/0bJvCNXRzYsBEK2UxPwC',
	      'event_callback': callback
	  });
	  return false;
	}
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
<!-- Código de instalación Cliengo para atvarquitectos.com.ar --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/655f4cbf2e2465003254195c/655f4cc12e2465003254195f.js?platform=dashboard'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })(); </script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MRBWMKS2');</script>
<!-- End Google Tag Manager -->



</head>
<script>
  fbq('track', 'Lead');
</script>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRBWMKS2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


	<div id="page" class="site">
		<?php include('includes/header-top.php'); ?>

		<div id="main" class="site-main" role="main">

			<?php include('includes/building.php') ?>

			<?php include('includes/selector-floor.php'); ?>

			<?php include('includes/location.php'); ?>

			<?php include('includes/renders.php'); ?>

			<?php include('includes/gallery.php'); ?>

        </div>
		<?php include('includes/footer.php'); ?>
	</div><!-- #page -->
	<?php $modals = array('view', '360'); ?>
	<?php require_once 'modal.php'; ?>
    <script src="assets/js/plugins.js" type="text/javascript" ></script>
    <script src="assets/js/main_dev-3.js" type="text/javascript" ></script>
	    <script async defer
	    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0hebqghS3vSNcCRyzFPaIgXEpDyB06FQ&callback=initMap">
	    </script>


</body>
</html>