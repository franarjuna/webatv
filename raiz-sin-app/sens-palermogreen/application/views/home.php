<?php include("inc/header.php");?>
<section id="sliderhome" style="width:100%;height:100vh;background:#ccc;">
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2500" data-pause="false">
  <div class="carousel-inner" style="height:100vh;">


<?php $a=0;
foreach($slider->result() as $r){

  if(file_exists("./upfiles/".$r->sliderhome_imagen)){
    $foto = "/upfiles/".$r->sliderhome_imagen;
  }else{
    $foto = "http://www.estudiofbdi.com/upfiles/".$r->sliderhome_imagen;
  }
  ?>
  <div class="carousel-item <?php echo ($a==0)?'active':'';?>" style="background-image:url(<?php echo $foto;?>);">
    <a href="<?php echo str_replace("www.","www.",$r->sliderhome_link);?>" style="display:block;position:absolute;width:100%;height:100%;top:0px;left:0px;z-index:10;">
  </a>
      <div class="detailheadtext  <?php echo ($r->sliderhome_blanco==0)?'negro':'';?>">

      <?php
          /*<p style="line-height: 1.167rem;margin-bottom:7px;"><?php echo $r->sliderhome_texto;?></p>*/?>
          <h2 class="page-heading page-heading--spaced" style="margin-bottom:10px;"><?php echo $r->sliderhome_nombre;?> <?php /*<a href="<?php echo $r->sliderhome_link;?>" class="hidden-xs  hidden-sm fullstory<?php echo ($r->sliderhome_blanco==0)?'black':'';?>"> View full story </a>*/ ?></h2>
          <?php
          /*<p class="sharep" style="font-size:.9rem;">Share</p>
           $url = $r->sliderhome_link;
          $media = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}".$foto;
          ?>
            <ul class="social-link-list">
              <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($url);?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://twitter.com/home?status=<?php echo urlencode($url);?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode($url);?>&media=<?php echo urlencode($media);?>&description=<?php echo urlencode($r->sliderhome_texto);?>" target="_blank"><i class="fab fa-pinterest"></i></a></li>
              <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($url);?>&title=<?php echo urlencode($r->sliderhome_texto);?>&summary=&source=" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            </ul>*/?>

      </div>
      <a href="<?php echo $r->sliderhome_link;?>" class="clickall"></a>
  </div>
<?php $a++; }?>
<ol class="carousel-indicators">
  <?php $a=0;
  foreach($slider->result() as $r){?>
  <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $a;?>" class="<?php echo ($a==0)?'active':'';?>"></li>
<?php $a++; }?>
</ol>
</div>
</div>
</section>
<section id="damero">
  <div class="container-fluid" style="padding:0px;">
  <div class="row no-gutters">
    <?php foreach($damerohome->result() as $r){
      $slug = url_title($r->contenido_nombre, 'dash', true);?>
      <div class="col-md-6 details" >
        <a href="/detail/<?php echo $slug."-".$r->contenido_id;?>">
          <h5><?php echo $r->contenido_nombre;?><?php /*<br><span><?php echo $r->contenido_sector;?></span>*/?></h5>
          <div class="overlay"></div>
          <img src="http://www.estudiofbdi.com/upfiles/<?php echo $r->contenido_imagen;?>" class="w-100"></a>
      </div>
    <?php }?>
  </div>
  </div>
</section>


<?php include("inc/footer.php");?>
