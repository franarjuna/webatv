<?php include("inc/header.php");?>
<section class="detailhead2 show <?php echo ($contenido['contenido_color']==1)?'blanco':'';?>" style="<?php echo ($contenido['contenido_fondo']!='')?'background-color:'.$contenido['contenido_fondo'].';':'';?>">
  <div class="container-fluid" >
    <div class="row">
      <div class="col-sm-6"></div>
      <div class="col-sm-5 case-study-hero__inner">
        <p style="font-size:.9rem;line-height: 1.167rem"><?php echo $contenido['contenido_nombre'];?><br><?php echo $contenido['contenido_sector'];?></p>
        <h2 class="page-heading page-heading--spaced"><?php echo $contenido['contenido_slogan'];?></h2>
        <p style="font-size:1rem;line-height: 1.352rem"><?php echo $contenido['contenido_descripcion'];?></p>
        <p class="sharep">Share</p>
        <?php
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $media = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        ?>
          <ul class="social-link-list">
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($url);?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://twitter.com/home?status=<?php echo urlencode($url);?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <?php /*<li><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>*/?>
            <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode($url);?>&media=<?php echo urlencode($media);?>&description=<?php echo urlencode($contenido['contenido_descripcion']);?>" target="_blank"><i class="fab fa-pinterest"></i></a></li>
            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($url);?>&title=<?php echo $contenido['contenido_nombre'];?>&summary=&source=" target="_blank"><i class="fab fa-linkedin"></i></a></li>
          </ul>
      </div>
    </div>
  </div>
</section>

<?php
  $json = preg_replace('/\r|\n/','\n',trim($contenido['contenido_contenido']));
$datadb = json_decode($json,true);
//var_dump($contenido['contenido_contenido']);
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
    echo '<section style="padding-bottom:20px;">';
    switch($dtdb['tipo']){
      case 1:
        echo '<div class="container"><div class="row detailtexts">';
          //echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
          echo (isset($dtdb['columna1']))?"<div class='col-md-5 '><strong>".$dtdb['titulo']."</strong><br>".nl2br($dtdb['columna1'])."</div>":'';
          echo (isset($dtdb['columna2']))?"<div class='col-sm-6 col-md-5 offset-md-1 offset-lg-1'>".nl2br($dtdb['columna2'])."</div>":'';
        echo '</div></div>';
      break;//Texto 2 columnas
      case 2:
        echo '<div class="container"><div class="row detailtexts">';
          echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
          echo (isset($dtdb['texto']))?"<div class='col-md-12'>".nl2br($dtdb['texto'])."</div>":'';
        echo '</div></div>';
        break;//Texto 1 columna
      case 7:
      echo '<div class="container"><div class="row detailtexts">';
        //echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
        echo "<div class='col-sm-5 col-md-4 col-lg-4 offset-md-1 offset-lg-1 cita'>";
          if(trim($dtdb['texto'])!=''){
            echo "<span>".$dtdb['texto']."</span>";
          }
          echo "<br>";
          echo "<br>";
          echo $dtdb['titulo'];
        echo "</div>";
        echo "<div class='col-sm-6 col-md-4 col-lg-4 offset-sm-1 offset-md-1 offset-lg-1'>";
          echo nl2br($dtdb['columna1']);
        echo "</div>";
        echo '</div></div>';
        break;//cita + texto
      case 8:
      echo '<div class="container"><div class="row detailtexts">';
        echo "<div class='col-sm-6 col-md-4 col-lg-4 offset-sm-1 offset-md-1 offset-lg-1'>";
          echo "<b>".($dtdb['titulo2'])."</b>";
          echo nl2br($dtdb['columna1']);
        echo "</div>";
        echo "<div class='col-sm-5 col-md-4 col-lg-4 offset-md-1 offset-lg-1 cita'>";
          if(trim($dtdb['texto'])!=''){
            echo "<span>".$dtdb['texto']."</span>";
          }
          echo "<br>";
          echo "<br>";
          echo $dtdb['titulo'];
        echo "</div>";
        echo '</div></div>';
        break;//cita + texto
      case 11:
      echo '<div class="container"><div class="row detailtexts">';
        //echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
        echo "<div class='col-sm-5 col-md-4 col-lg-4 offset-md-1 offset-lg-1 cita'>";
        if(trim($dtdb['texto'])!=''){
          echo "<span>".$dtdb['texto']."</span>";
        }
          echo "<br>";
          echo "<br>";
          echo $dtdb['titulo'];
        echo "</div>";
        echo "<div class='col-sm-6 col-md-6 col-lg-6 offset-sm-1 offset-md-1 offset-lg-1'>";
        if(isset($dtdb['file']) && is_array($dtdb['file'])){
          foreach($dtdb['file'] as $file){
            echo (isset($file))?"<img src='/upfiles/".$file."' class='w-100'>":'';
          }
        }
        echo "</div>";
        echo '</div></div>';
        break;//cita + texto
      case 12:
      echo '<div class="container"><div class="row detailtexts">';
        echo "<div class='col-sm-6 col-md-4 col-lg-4 offset-sm-1 offset-md-1 offset-lg-1'>";
        if(isset($dtdb['file']) && is_array($dtdb['file'])){
        foreach($dtdb['file'] as $file){
          echo (isset($file))?"<img src='/upfiles/".$file."' class='w-100'>":'';
        }
        }
        echo "</div>";
        echo "<div class='col-sm-5 col-md-4 col-lg-4 offset-md-1 offset-lg-1 cita'>";
        if(trim($dtdb['texto'])!=''){
          echo "<span>".$dtdb['texto']."</span>";
        }
          echo "<br>";
          echo "<br>";
          echo $dtdb['titulo'];
        echo "</div>";
        echo '</div></div>';
        break;//cita + texto
      case 13:
      echo '<div class="container"><div class="row detailtexts">';

        echo "<div class='col-sm-8 col-md-8 col-lg-8 offset-md-2 offset-lg-2 cita' style='text-align:center;'>";
        if(trim($dtdb['texto'])!=''){
          echo "<span>".$dtdb['texto']."</span>";
        }
          echo "<br>";
          echo "<br>";
          echo $dtdb['titulo'];
        echo "</div>";
        echo '</div></div>';
        break;//cita + texto
      case 3:
      echo '<div class="container-fluid"><div class="row" style="max-width:90%;margin: 0px auto;">';
      if(isset($dtdb['file']) && is_array($dtdb['file'])){
        foreach($dtdb['file'] as $file){
          echo (isset($file))?"<div class='col-md-6' style='padding-top: 15px;padding-bottom: 15px;'><img src='/upfiles/".$file."' class='w-100'></div>":'';
        }
      }
        echo '</div></div>';
      break;//Damero
      case 6:
      echo '<div class="container-fluid" style="padding:0px;"><div class="row no-gutters">';
      if(isset($dtdb['file']) && is_array($dtdb['file'])){
        foreach($dtdb['file'] as $file){
          echo (isset($file))?"<div class='col-md-12'><img src='/upfiles/".$file."' class='w-100'></div>":'';
        }
      }
        echo '</div></div>';
      break;//full
      case 4:
        echo '<div id="carousel'.$kdb.'" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2500" data-pause="false">';
          echo '<div class="carousel-inner" style="min-height:80vh;">';
        $x = 0;
        if(isset($dtdb['file']) && is_array($dtdb['file'])){
          foreach($dtdb['file'] as $file){
            echo '<div class="carousel-item '.(($x==0)?'active':'').'"><img class="d-block w-100" src="/upfiles/'.$file.'"></div>';
            $x++;
          }
        }
        echo '</div>';
        echo '<ol class="carousel-indicators">';$a=0;
        foreach($dtdb['file'] as $file){
          echo '<li data-target="#carousel'.$kdb.'" data-slide-to="'.$a.'" class="'.(($a==0)?'active':'').'"></li>';
          $a++;
        }
        echo '</ol>';

        echo '</div>';
        echo '</div>';
      break;//Slider
      case 5:
        $link = $dtdb['video'];

        echo '<div class="container">';
        echo '<div style="position:relative;padding-top:56.25%;">';
        $link = str_replace("https://vimeo.com/","https://player.vimeo.com/video/",$link);//https://player.vimeo.com/video/336812660
        echo '<iframe title="vimeo-player" src="'.$link.'" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allowfullscreen></iframe>';

        echo '</div>';
        echo '</div>';
      break;//video
    }
    echo '</section>';
  }
}
 ?>

<?php include("inc/footer.php");?>
