<?php include("inc/header.php");?>
<section class="textointerno" style="background-color: #000;
    background-image: url('<?php echo $fondo;?>');       padding: 100px 0px;
    background-size: cover;
    background-position: center;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="page-heading" style="font-family: TheinhardtRegular,Helvetica,Arial,sans-serif;color:#fff;"><?php echo $cfg->cfg_textowork;?></p>
        </div>
      </div>
    </div>

</section>

<section class=" show">
  <div class="container-fluid" style="padding:0px;">
    <div class="row no-gutters">
      <?php
      $x = 1;
			$array = array(5,6,11,12,17,18,23,24,29,30,35,36,41,42,47,48,53,54,59,60);
      foreach($works as $r){
        $slug = url_title($r->contenido_nombre, 'dash', true);?>
        <div class="col-md-<?php echo (in_array($x,$array))?6:3;?> details">
          <a href="/detail/<?php echo $slug."-".$r->contenido_id;?>">
            <h5><?php echo $r->contenido_nombre;?><br><span><?php echo $r->contenido_sector;?></span></h5>
            <div class="overlay"></div>
            <img src="http://www.estudiofbdi.com/upfiles/<?php echo $r->contenido_imagen;?>" class="w-100"></a>
        </div>
      <?php $x++; }?>
    </div>
  </div>
</section>
<?php include("inc/footer.php");?>
