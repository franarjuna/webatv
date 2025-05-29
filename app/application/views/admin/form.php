<?php include("header.php");?>
<!-- Begin page -->
<div id="wrapper">
  <?php include("top.php");?>
  <div class="content-page">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
        <div class="card-box">
          <h4 class="m-t-0 header-title"><?php echo $tituloform;?></h4>

          <form role="form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="procesarform" value="1">
            <input type="hidden" name="<?php echo $primary;?>" value="<?php echo intval($rs[$primary]);?>">

          <?php
          foreach($fields as $kf=>$f){
            $mostrar = 1;
            if($f['fieldcomponent'] == 'oculto' || $f['fieldcomponent'] == 'fijo' || $f['fieldcomponent'] == 'ctrlid'){
              $mostrar = 0;
            }
            if($f['fieldcomponent'] == 'separador'){
               echo "<h2>".$f['fieldlabel']."</h2>";
            }elseif($mostrar == 1){
              ?>
          <div class="form-group row">
            <label class="col-sm-2  col-form-label" for="example-input-small"><?php echo $f['fieldlabel'];?></label>
            <div class="col-sm-10">
            <?php
            switch($f['fieldcomponent']){
              case 'texto':
              ?>
                <input class="form-control" type="text" id="<?php echo $kf;?>" name="<?php echo $kf;?>" value="<?php echo $rs[$kf];?>">
              <?php
              break;
              case 'password':
              ?>
                <input class="form-control" type="password" id="<?php echo $kf;?>" name="<?php echo $kf;?>">
              <?php
              break;
              case 'slug':
              ?>
                <input class="form-control" pattern="[a-zA-Z0-9_.-]" type="text" id="<?php echo $kf;?>" name="<?php echo $kf;?>" value="<?php echo $rs[$kf];?>">
              <?php
              break;

              case 'colorpicker':
              ?>
                  <input type="text" class="colorpicker-default form-control" id="<?php echo $kf;?>" name="<?php echo $kf;?>" value="<?php echo $rs[$kf];?>">
              <?php
              break;
              case 'select':
              case 'lista':
                $table = "proyecto";
                $vq = $this->db->query("SELECT * FROM ".$table." ORDER BY ".$table."_nombre ");
              ?>
                  <select class="form-control" id="<?php echo $kf;?>" name="<?php echo $kf;?>">
                    <option>--</option>
                    <?php foreach($vq->result() as $rsel){?>
                      <option value="<?php echo $rsel->{$table."_id"};?>" <?php echo ($rsel->{$table."_id"} == $rs[$kf])?'selected':'';?> ><?php echo $rsel->{$table."_nombre"};?></option>
                    <?php }?>
                  </select>
              <?php
              break;
              case 'fecha':
              case 'calendario':
              ?>
                <input class="form-control date-picker" type="date" id="<?php echo $kf;?>" name="<?php echo $kf;?>" value="<?php echo $rs[$kf];?>">
              <?php
              break;
              case 'radio':
                foreach($f['opciones'] as $vopcion=>$opcion){
                ?>
                  <input type="radio" id="<?php echo $kf;?>" name="<?php echo $kf;?>" value="<?php echo $vopcion;?>" <?php 
                  if($vopcion == $rs[$kf]){
                    echo "checked";
                  }
                  ?>> 
                <?php echo $opcion;
                }
                break;
              case 'orden':
              case 'numero':
              ?>
                <input class="form-control" type="number" id="<?php echo $kf;?>" name="<?php echo $kf;?>" value="<?php echo $rs[$kf];?>">
              <?php
              break;
              case 'textarea':
              ?>
                <textarea class="form-control" name="<?php echo $kf;?>"><?php echo $rs[$kf];?></textarea>
              <?php
              break;
              case 'ckeditor':
              ?>
              <div id="<?php echo $kf;?>"></div>
              <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
              <script>
                  CKEDITOR.replace( '<?php echo $kf;?>' );
              </script>
                <textarea class="form-control" name="<?php echo $kf;?>"><?php echo $rs[$kf];?></textarea>
              <?php
              break;
              case 'contenido':

               ?>
              <div id="<?php echo $kf;?>_div" class=" col-md-8 contenidodiv"><?php

              $datadb = json_decode($rs[$kf],true);
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

                  $qsmod = $this->db->query("SELECT * FROM modelo WHERE modelo_id=?",array(intval($dtdb['tipo'])));
                  foreach($qsmod->result() as $rmod){
                    $t = $kdb;
                    $data = json_decode($rmod->modelo_data,true);
                    echo "<div style='padding-bottom:20px;' id='model_".$t."'>";
                    echo "<h5 style='background-color:#e3e3e3;padding:5px 5px;'>";
                    echo "<input type='number' name='".$kf."[".$t."][orden]' style='width:40px;padding:3px 1px;margin-right:4px;' value='".$dtdb['orden']."'>";
                    echo $rmod->modelo_nombre." <a class='btn eliminarbloque' data-id='model_".$t."'>X</a>";
                    echo "</h5>";
                    echo "<input type='hidden' name='".$kf."[".$t."][tipo]' value='".intval($dtdb['tipo'])."'>";
                    //print_r($data);
                    foreach($data as $kdt=>$dt){
                      echo "<label>".$dt['label']."</label>";
                      //$kdt = str_replace(" ","_",$kdt);
                      $valor = (isset($dtdb[$kdt]))?$dtdb[$kdt]:'';
                      switch($dt['tipo']){
                        case 'textarea':
                          echo "<textarea name='".$kf."[".$t."][".$kdt."]' class='form-control' style='height:200px;'>".$valor."</textarea>";
                        break;
                        case 'imagen':
                        case 'multiimagen':
                          echo '<div id="files'.$kdt."_".$t.'" class="files"></div>';
                          echo "<input type='file' id='upfile_".$kdt."_".$t."' name='files[]' data-input='file_".$kdt."_".$t."'  data-url='/admin/imageupload/upfile_".$kdt."_".$t."' multiple>";
                          echo "<input type='hidden' name='".$kf."[".$t."][".$kdt."]' id='file_".$kdt."_".$t."'>";
                          echo "<div id='divfile_".$kdt."_".$t."' class='row'>";
                          if(!isset($dtdb[$kdt])){
                            $dtdb[$kdt] = array();
                          }
                          if(isset($dtdb[$kdt]) && is_array($dtdb[$kdt])){
                            foreach($dtdb[$kdt] as $fs){
                              echo "<div class='col-md-3' data-img='".$fs."'>";
                              echo "<img src='http://atvarquitectos.com/upfiles/".$fs."' style='width:100%'>";
                              echo "<input type='hidden' name='".$kf."[".$t."][".$kdt."][]' id='file_".$kdt."_".$t."' value='".$fs."'>";
                              echo "<a class='eliminafoto btn btn-danger' data-foto='".$fs."'><i class='mdi mdi-close'></i></a>";
                              echo "</div>";
                            }
                          }
                          echo "</div>";

                          echo '<div id="progress'.$kdt.'_'.$t.' class="progress">';
                          echo '<div class="progress-bar progress-bar-success cargando'.$kdt.'_'.$t.'"></div>';
                          echo '</div>';
                          ?>
                          <script>
                          $(function(){ $('#upfile_<?php echo $kdt;?>_<?php echo $t;?>').fileupload({
                              dataType: 'json',
                              progress: function (e, data) {
                                  var progress = parseInt(data.loaded / data.total * 100, 10);
                                  $(".cargando<?php echo $kdt;?>_<?php echo $t;?>").html(progress + "%");
                              },
                              done: function (e, data) {
                                  $.each(data.result.files, function (index, file) {
                                    var html = $("#divfile_<?php echo $kdt;?>_<?php echo $t;?>").html();
                                    html = html + "<div class='col-md-3' data-img='"+file.name+"'>";
                                    html = html + "<img src='"+file.url+"' style='width:100%'>";
                                    html = html + "<input type='hidden' name='<?php echo $kf."[".$t."]";?>[<?php echo $kdt;?>][]' id='file_<?php echo $kdt;?>_<?php echo $t;?>' value='"+file.name+"'>";
                                    html = html + "</div>";
                                      $("#divfile_<?php echo $kdt;?>_<?php echo $t;?>").html(html);
                                      $(".cargando<?php echo $kdt;?>_<?php echo $t;?>").remove();
                                  });
                              }
                            });
                          });
                          </script><?php

                        break;
                        case 'texto':
                        case 'video':
                        case 'url':
                          echo "<input type='text' name='".$kf."[".$t."][".$kdt."]' class='form-control' value='".$valor."'>";
                        break;
                        case 'options':
                          echo "<div>";
                          foreach($dt['opciones'] as $opciones){
                            echo "<label><input type='radio' name='".$kf."[".$t."][".$kdt."]'  value='".$opciones."' ".(($valor == $opciones)?'checked':'')."> ".$opciones." </label> | ";
                          }
                          echo "</div>";
                          break;
                      }
                      //echo "<label>".$kdt."</label>";
                    }
                    echo "</div>";
                  }
                }
              }
               ?></div>
               <div class="input-group">
              <input type="hidden" id="nuevomodelocampo" value="<?php echo $kf;?>">
              <select id="nuevomodelo" class="form-control">
                <option value="">SELECCIONE</option>
                <?php 
                if(isset($f['tipocontenido'])){
                  $_modelos = array();
                  $qmsmod = $this->db->query("SELECT * FROM modelo WHERE (modelo_campo = ? OR modelo_campo = '') ORDER BY modelo_nombre",array($f['tipocontenido']));
                  foreach($qmsmod->result() as $rmod){
                    $_modelos[] = (array)$rmod; 
                  }
                }else{
                  $_modelos = $modelos;
                }
                
                foreach($_modelos as $mod){?>
                  <option value="<?php echo $mod['modelo_id'];?>"><?php echo $mod['modelo_nombre'];?></option>
                <?php }?>
              </select>
              <div class="input-group-append">
                  <button type="button" id="<?php echo $kf;?>_add" class="btn btn-primary bootstrap-touchspin-up nuevomodelo"><i class="ti-plus"></i></button>
              </div>
          </div>
              <?php
              break;
              case 'imagen':
              case 'archivo':
              ?>
                <input type="file" name="<?php echo $kf;?>" value="<?php echo $rs[$kf];?>">
              <?php
                if($rs[$kf]!=''){
                  echo "<br><a href='http://atvarquitectos.com/upfiles/".$rs[$kf]."' target='_blank'>ACTUAL</a>";
                  ?><br>
                  BORRAR?
                  <input type="radio" name="borrar_<?php echo $kf;?>" value="1"> Si |
                  <input type="radio" name="borrar_<?php echo $kf;?>" value="0" checked> No
                  <?
                }
              break;
              case 'boolean':
              ?>
                <input type="radio" name="<?php echo $kf;?>" value="1" <?php echo (isset($rs[$kf]) && $rs[$kf]==1)?'checked':'';?>> Si |
                <input type="radio" name="<?php echo $kf;?>" value="0" <?php echo (!isset($rs[$kf]) || $rs[$kf]!=1)?'checked':'';?>> No
              <?php
              break;


            }

             ?>
          </div>
          </div>
        <?php }else{?>
          <input type="hidden" name="<?php echo $kf;?>" value="<?php echo $f['defaultvalue'];?>">
        <?php }?>
        <?php }?>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <script>
var section = '<?php echo $section;?>';
var ajaxsource = '';


var slug = function(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();

  // remove accents, swap ñ for n, etc
  var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
  var to   = "aaaaaeeeeeiiiiooooouuuunc------";
  for (var i = 0, l = from.length; i < l; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
           .replace(/\s+/g, '-') // collapse whitespace and replace by -
           .replace(/-+/g, '-'); // collapse dashes

  return str;
};


  </script>
  <?php include("footer.php");?>
