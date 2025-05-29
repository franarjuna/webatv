<?php
	require("../tagsession.php");
	require_once 'config.php';
	require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="es-ES" >
<head>
<?php
printMetaTags($meta_tags);

$ver = '0.4.0';
?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png"/>
	<title><?php echo SITE_TITLE; ?></title>
	<link rel='stylesheet' href='assets/css/app.css?v=<?php echo $ver; ?>' type='text/css' />
	<script type='text/javascript' src='assets/js/jquery-3.3.1.min.js'></script>
	<script type='text/javascript' src='assets/js/departamentos.js?v=<?php echo $ver; ?>'></script>



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-57334305-8"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-57334305-8');
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


		<div id="main" class="site-main" role="main">
			<?php include('includes/header.php'); ?>

			<?php include('includes/selector-floor.php'); ?>

			<?php include('includes/location.php'); ?>
			<?php include('includes/gallery.php'); ?>

			<?php include('includes/renders.php'); ?>

    </div>
		<?php include('includes/footer.php'); ?>
	</div><!-- #page -->
	<?php $modals = array('view', '360'); ?>
	<?php require_once 'modal.php'; ?>
    <script src="assets/js/plugins.js?v=<?php echo $ver; ?>" type="text/javascript" ></script>
    <script src="assets/js/main.js?v=<?php echo $ver; ?>" type="text/javascript" ></script>
	    <script async defer
	    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0hebqghS3vSNcCRyzFPaIgXEpDyB06FQ&callback=initMap">
	    </script>
</body>
</html>