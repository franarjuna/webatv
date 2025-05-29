<?php include("inc/header.php");?>
<section class="detailhead show">
  <div class="container-fluid" style="padding:0px;">
    <div class="row no-gutters">
      <div class="col-md-12">
        <img src="//www.estudiofbdi.com/upfiles/<?php echo $galeria[0]['galeria1_imagen'];?>">
        <div class="detailheadtext">
          <h2 class="f-54"><?php echo $contenido['contenido_nombre'];?></h2>
          <h4 class="f-17"><?php echo $contenido['contenido_slogan'];?></h4>
          <p class="sharep">Share: <a><i class="fab fa-facebook-f"></i></a><a><i class="fab fa-twitter"></i></a><a><i class="fab fa-instagram"></i></a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php

$datadb = json_decode($contenido['contenido_contenido'],true);
if($datadb!==FALSE && !empty($datadb)){
  //DATA
  function cmp($a, $b)
  {
      if ($a['orden'] == $b['orden']) {
          return 0;
      }
      return ($a['orden'] < $b['orden']) ? -1 : 1;
  }
  usort($datadb,"cmp");
  foreach($datadb as $kdb=>$dtdb){
    switch($dtdb['tipo']){
      case 1:
        echo '<section style="padding-top:40px;padding-bottom:40px;"><div class="container"><div class="row detailtexts">';
          //echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
          echo (isset($dtdb['columna1']))?"<div class='col-md-5 '><strong>".$dtdb['titulo']."</strong><br>".nl2br($dtdb['columna1'])."</div>":'';
          echo (isset($dtdb['columna2']))?"<div class='col-sm-6 col-md-5 offset-md-1 offset-lg-1'>".nl2br($dtdb['columna2'])."</div>":'';
        echo '</div></div></section>';
      break;//Texto 2 columnas
      case 2:
        echo '<section style="padding-top:40px;padding-bottom:40px;"><div class="container"><div class="row detailtexts">';
          echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
          echo (isset($dtdb['texto']))?"<div class='col-md-12'>".nl2br($dtdb['texto'])."</div>":'';
        echo '</div></div></section>';
        break;//Texto 1 columna
      case 7:
      echo '<section style="padding-top:40px;padding-bottom:40px;"><div class="container"><div class="row detailtexts">';
        //echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
        echo (isset($dtdb['cita']))?"<div class='col-sm-5 col-md-5 col-lg-4 col-md-offset-1 col-lg-offset-1'></div>":'';
        echo (isset($dtdb['cita']))?"</div>":'';
        echo (isset($dtdb['columna2']))?"<div class='col-sm-6 col-md-5 col-lg-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1'>".nl2br($dtdb['columna2'])."</div>":'';
      echo '</div></div></section>';
        break;//cita + texto
      case 3:
      echo '<section style="padding-top:40px;padding-bottom:40px;"><div class="container"><div class="row">';

      foreach($dtdb['file'] as $file){
        echo (isset($file))?"<div class='col-md-6' style='padding-top: 15px;padding-bottom: 15px;'><img src='/upfiles/".$file."' class='w-100'></div>":'';
      }
        echo '</div></div></section>';
      break;//Damero
      case 6:
      echo '<section><div class="container-fluid" style="padding:0px;"><div class="row no-gutters">';
      foreach($dtdb['file'] as $file){
        echo (isset($file))?"<div class='col-md-12'><img src='/upfiles/".$file."' class='w-100'></div>":'';
      }
        echo '</div></div></section>';
      break;//full
      case 4:
        echo '<section><div id="carousel'.$kdb.'" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
        $x = 0;
        foreach($dtdb['file'] as $file){
          echo '<div class="carousel-item '.(($x==0)?'active':'').'"><img class="d-block w-100" src="/upfiles/'.$file.'"></div>';
          $x++;
        }
        echo '</div></section>';
      break;//Slider
      case 5: break;//video
    }

  }
}
 ?>

<?php include("inc/footer.php");?>
