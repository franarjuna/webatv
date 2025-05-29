<?php include("header.php"); ?>
<!-- Begin page -->
<div id="wrapper">
  <?php include("top.php"); ?>
  <div class="content-page">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card-box">
              <h4 class="m-t-0 header-title"><?php echo $tituloform; ?></h4>

              <form role="form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="procesarform" value="1">
                <input type="hidden" name="<?php echo $primary; ?>" value="<?php echo intval($rs[$primary]); ?>">

                <?php
                foreach ($fields as $kf => $f) {
                  $mostrar = 1;
                  if ($f['fieldcomponent'] == 'oculto' || $f['fieldcomponent'] == 'fijo') {
                    $mostrar = 0;
                  }
                  if ($mostrar == 1) { ?>
                    <div class="form-group row">
                      <label class="col-sm-2  col-form-label" for="example-input-small"><?php echo $f['fieldlabel']; ?></label>
                      <div class="col-sm-10">
                        <?php
                        switch ($f['fieldcomponent']) {
                          case 'texto':
                        ?>
                            <input class="form-control" type="text" id="<?php echo $kf; ?>" name="<?php echo $kf; ?>" value="<?php echo $rs[$kf]; ?>">
                          <?php
                            break;
                          case 'colorpicker':
                          ?>
                            <input type="text" class="colorpicker-default form-control" id="<?php echo $kf; ?>" name="<?php echo $kf; ?>" value="<?php echo $rs[$kf]; ?>">
                          <?php
                            break;
                          case 'fecha':
                          case 'calendario':
                          ?>
                            <input class="form-control date-picker" type="text" id="<?php echo $kf; ?>" name="<?php echo $kf; ?>" value="<?php echo $rs[$kf]; ?>">
                          <?php
                            break;
                          case 'orden':
                          case 'numero':
                          ?>
                            <input class="form-control" type="number" id="<?php echo $kf; ?>" name="<?php echo $kf; ?>" value="<?php echo $rs[$kf]; ?>">
                          <?php
                            break;
                          case 'textarea':
                          ?>
                            <textarea class="form-control" name="<?php echo $kf; ?>"><?php echo $rs[$kf]; ?></textarea>
                          <?php
                            break;
                          case 'contenido':

                          ?>
                            <div id="<?php echo $kf; ?>_div" class=" col-md-8 contenidodiv"><?php

                                                                                            $datadb = json_decode($rs[$kf], true);
                                                                                            if ($datadb !== FALSE && !empty($datadb)) {
                                                                                              //DATA
                                                                                              function cmp($a, $b)
                                                                                              {
                                                                                                if ($a['orden'] == $b['orden']) {
                                                                                                  return 0;
                                                                                                }
                                                                                                return ($a['orden'] < $b['orden']) ? -1 : 1;
                                                                                              }
                                                                                              usort($datadb, "cmp");
                                                                                              foreach ($datadb as $kdb => $dtdb) {
                                                                                                $qsmod = $this->db->query("SELECT * FROM modelo WHERE modelo_id=?", array(intval($dtdb['tipo'])));
                                                                                                foreach ($qsmod->result() as $rmod) {
                                                                                                  $t = $kdb;
                                                                                                  $data = json_decode($rmod->modelo_data, true);
                                                                                                  echo "<div style='padding-bottom:20px;' id='model_" . $t . "'>";
                                                                                                  echo "<h5 style='background-color:#e3e3e3;padding:5px 5px;'>";
                                                                                                  echo "<input type='number' name='" . $kf . "[" . $t . "][orden]' style='width:40px;padding:3px 1px;margin-right:4px;' value='" . $dtdb['orden'] . "'>";
                                                                                                  echo $rmod->modelo_nombre . " <a class='btn eliminarbloque' data-id='model_" . $t . "'>X</a>";
                                                                                                  echo "</h5>";
                                                                                                  echo "<input type='hidden' name='" . $kf . "[" . $t . "][tipo]' value='" . intval($dtdb['tipo']) . "'>";
                                                                                                  //print_r($data);
                                                                                                  foreach ($data as $kdt => $dt) {
                                                                                                    echo "<label>" . $dt['label'] . "</label>";
                                                                                                    //$kdt = str_replace(" ","_",$kdt);
                                                                                                    $valor = (isset($dtdb[$kdt])) ? $dtdb[$kdt] : '';
                                                                                                    switch ($dt['tipo']) {
                                                                                                      case 'textarea':
                                                                                                        echo "<textarea name='" . $kf . "[" . $t . "][" . $kdt . "]' class='form-control' style='height:200px;'>" . $valor . "</textarea>";
                                                                                                        break;
                                                                                                      case 'multiimagen':
                                                                                                        echo '<div id="files' . $t . '" class="files"></div>';
                                                                                                        echo "<input type='file' id='upfile_" . $kdt . "_" . $t . "' name='files[]' data-input='file_" . $kdt . "_" . $t . "'  data-url='/admin/imageupload/upfile_" . $t . "' multiple>";
                                                                                                        echo "<input type='hidden' name='" . $kf . "[" . $t . "][" . $kdt . "]' id='file_" . $t . "'>";
                                                                                                        echo "<div id='divfile_" . $kdt . "_" . $t . "' class='row'>";
                                                                                                        if (!isset($dtdb[$kdt])) {
                                                                                                          $dtdb[$kdt] = array();
                                                                                                        }
                                                                                                        if (isset($dtdb[$kdt]) && is_array($dtdb[$kdt])) {
                                                                                                          foreach ($dtdb[$kdt] as $fs) {
                                                                                                            echo "<div class='col-md-3' data-img='" . $fs . "'>";
                                                                                                            echo "<img src='/upfiles/" . $fs . "' style='width:100%'>";
                                                                                                            echo "<input type='hidden' name='" . $kf . "[" . $t . "][" . $kdt . "][]' id='file_" . $kdt . "_" . $t . "' value='" . $fs . "'>";
                                                                                                            echo "<a class='eliminafoto btn btn-danger' data-foto='" . $fs . "'><i class='mdi mdi-close'></i></a>";
                                                                                                            echo "</div>";
                                                                                                          }
                                                                                                        }
                                                                                                        echo "</div>";

                                                                                                        echo '<div id="progress' . $t . ' class="progress">';
                                                                                                        echo '<div class="progress-bar progress-bar-success cargando' . $t . '"></div>';
                                                                                                        echo '</div>';
                                                                                            ?>
                                          <script>
                                            $(function() {
                                              $('#upfile_<?php echo $kdt; ?>_<?php echo $t; ?>').fileupload({
                                                dataType: 'json',
                                                progress: function(e, data) {
                                                  var progress = parseInt(data.loaded / data.total * 100, 10);
                                                  $(".cargando<?php echo $t; ?>").html(progress + "%");
                                                },
                                                done: function(e, data) {
                                                  $.each(data.result.files, function(index, file) {
                                                    var html = $("#divfile_<?php echo $kdt; ?>_<?php echo $t; ?>").html();
                                                    html = html + "<div class='col-md-3' data-img='" + file.name + "'>";
                                                    html = html + "<img src='" + file.url + "' style='width:100%'>";
                                                    html = html + "<input type='hidden' name='<?php echo $kf . "[" . $t . "]"; ?>[<?php echo $kdt; ?>][]' id='file_<?php echo $kdt; ?>_<?php echo $t; ?>' value='" + file.name + "'>";
                                                    html = html + "</div>";
                                                    $("#divfile_<?php echo $kdt; ?>_<?php echo $t; ?>").html(html);
                                                    $(".cargando<?php echo $t; ?>").remove();
                                                  });
                                                }
                                              });
                                            });
                                          </script><?php

                                                                                                        break;
                                                                                                      case 'texto':
                                                                                                      case 'video':
                                                                                                      case 'url':
                                                                                                        echo "<input type='text' name='" . $kf . "[" . $t . "][" . $kdt . "]' class='form-control' value='" . $valor . "'>";
                                                                                                        break;
                                                                                                    }
                                                                                                    //echo "<label>".$kdt."</label>";
                                                                                                  }
                                                                                                  echo "</div>";
                                                                                                }
                                                                                              }
                                                                                            }
                                                    ?>
                            </div>
                            <div class="input-group">
                              <input type="hidden" id="nuevomodelocampo" value="<?php echo $kf; ?>">
                              <select id="nuevomodelo" class="form-control">
                                <option value="">SELECCIONE</option>
                                <?php foreach ($modelos as $mod) { ?>
                                  <option value="<?php echo $mod['modelo_id']; ?>"><?php echo $mod['modelo_nombre']; ?></option>
                                <?php } ?>
                              </select>
                              <div class="input-group-append">
                                <button type="button" id="<?php echo $kf; ?>_add" class="btn btn-primary bootstrap-touchspin-up nuevomodelo"><i class="ti-plus"></i></button>
                              </div>
                            </div>
                          <?php
                            break;
                          case 'imagen':
                          case 'archivo':
                          ?>
                            <input type="file" name="<?php echo $kf; ?>" value="<?php echo $rs[$kf]; ?>">
                            <?php
                            if ($rs[$kf] != '') {
                              echo "<br><a href='/upfiles/" . $rs[$kf] . "' target='_blank'>ACTUAL</a>";
                            }
                            break;
                          case 'boolean':
                            ?>
                            <input type="radio" name="<?php echo $kf; ?>" value="1" <?php echo (isset($rs[$kf]) && $rs[$kf] == 1) ? 'checked' : ''; ?>> Si |
                            <input type="radio" name="<?php echo $kf; ?>" value="0" <?php echo (!isset($rs[$kf]) || $rs[$kf] != 1) ? 'checked' : ''; ?>> No
                        <?php
                            break;
                        }

                        ?>
                      </div>
                    </div>
                  <?php } else { ?>
                    <input type="hidden" name="<?php echo $kf; ?>" value="<?php echo $f['defaultvalue']; ?>">
                  <?php } ?>
                <?php } ?>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    var section = '<?php echo $section; ?>';
    var ajaxsource = '';
  </script>
  <?php include("footer.php"); ?>