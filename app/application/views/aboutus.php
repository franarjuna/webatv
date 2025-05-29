<?php include("inc/header.php");?>
<section class="textointerno" style="background-color: #000;
    background-image: url('<?php echo $fondo;?>');       padding: 100px 0px;
    background-size: cover;
    background-position: center;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="page-heading" style="font-family: TheinhardtRegular,Helvetica,Arial,sans-serif;color:#fff;"><?php echo $cfg->cfg_textoabout;?></p>
        </div>
      </div>
    </div>

</section>
<section id="damero">
  <div class="container-fluid" style="padding:0px;">
  <div class="row no-gutters">
    <?php foreach($aboutus as $cols){?>
      <div class="col-md-3" >
        <?php foreach($cols as $items){?>
          <div class="col-md-12" style="padding:0px;">
            <?php if($items['aboutus_imagen']!=''){?>
              <?php if(file_exists($_SERVER['DOCUMENT_ROOT']."/upfiles/".$items['aboutus_imagen'])){?>
              <img src="/upfiles/<?php echo $items['aboutus_imagen'];?>" class="w-100">
            <?php }else{?>
              <img src="http://www.estudiofbdi.com/upfiles/<?php echo $items['aboutus_imagen'];?>" class="w-100">
              <?php }?>
            <?php }?>
            <div class="col-md-12" style="padding:10px;">
              <h3 class="f-18" style="margin-bottom:2px;"><?php echo $items['aboutus_nombre'];?></h3>
              <h4 class="f-14"><?php echo $items['aboutus_titulo'];?></h4>
              <p ><?php echo $items['aboutus_texto'];?></p>
            </div>
          </div>
        <?php }?>
      </div>

    <?php }?>
  </div>
  </div>
</section>


<?php include("inc/footer.php");?>
