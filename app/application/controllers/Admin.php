<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    // Your own constructor code
  }
  public function config()
  {
    $this->load->view('admin/config', $this->data);
  }
  public function index()
  {

    //USUARIO DESLOGUEADO
    if (!isset($_SESSION['cid']) || intval($_SESSION['cid']) == 0) {
      unset($_SESSION['cid']);
      $this->load->view('admin/login', $this->data);
    } else {
      $this->data['titulo_pagina'] = 'Dashboard';

      /*$ar = array("titulo" => array("label"=>"","tipo"=>""),"columna1" => array("label"=>"","tipo"=>""));
      echo json_encode($ar);*/
      $data = array();
      $data['section'] = "home";
      $seccion = $this->uri->segment(2);
      $accion = $this->uri->segment(3);
      $ide = $this->uri->segment(4);
      $this->data['section_name'] = "Dashboard";
      $this->data['section'] = $seccion;
      if ($seccion == '') {
        $this->load->view('admin/home', $this->data);
      } elseif ($seccion == 'imageupload') {

        $this->load->library('upload');
        $rs = array();
        $rs['files'] = array();
        if (isset($_FILES)) {
          $files = $_FILES;
          foreach ($_FILES as $k => $v) {
            if (isset($v['name']) && is_array($v['name'])) {
              foreach ($v['name'] as $knam => $nam) {
                $ide = 0;
                $filename = str_replace(" ", "", $nam);
                $filename = $ide . "_" . time() . "_" . $filename;

                $config = array();
                $config['upload_path'] = '/home/atvarqui/public_html/upfiles/';
                $config['file_name'] = $filename;
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|mp4|mov|webp';
                $this->upload->initialize($config);


                $_FILES['userfile'] = array();
                $_FILES['userfile']['name'] = $filename;
                $_FILES['userfile']['type'] = $files[$k]['type'][$knam];
                $_FILES['userfile']['tmp_name'] = $files[$k]['tmp_name'][$knam];
                $_FILES['userfile']['error'] = $files[$k]['error'][$knam];
                $_FILES['userfile']['size'] = $files[$k]['size'][$knam];

                $this->upload->initialize($config);
                //$this->upload->do_upload();
                if ($this->upload->do_upload('userfile')) {
                  $rs['files'][] = array(
                    "thumbnailUrl" => 'https://atvarquitectos.com/upfiles/' . $filename,
                    "name" => $filename,
                    "url" => 'https://atvarquitectos.com/upfiles/' . $filename,
                    "deleteType" => "DELETE",
                    "type" => $v['type'],
                    "deleteUrl" => 'https://atvarquitectos.com/upfiles/' . $filename,
                    "size" => $v['size']
                  );
                }
              }
            }
          }
        }

        echo json_encode($rs);
        die();
      } else {
        include(APPPATH . "/third_party/conf/" . $seccion . ".php");
        $this->data['section_name'] = $module_title;
        $this->data['primary'] = $maintable . "_id";
        $this->data['fields'] = $fields;
        $this->data['ajaxsource'] = "/admin/" . $seccion . "/ajax";
        $this->data['heads'] = array();
        foreach ($list as $li) {
          $this->data['heads'][] = $fields[$li]['fieldlabel'];
        }
        $this->data['heads'][] = '';
        //$qs = $this->db->get($maintable)->order_by('sliderhome_id', 'DESC');;
        $search = $this->input->get('search');
        $where = $maintable . "_id!=0" . ((isset($sqlfiltro)) ? " AND " . $sqlfiltro : '');
        if (isset($search['value'])) {
          $where .= " AND " . $maintable . "_nombre LIKE '%" . $search['value'] . "%'";
        }
        if ($maintable == 'proyecto') {
          $qs = $this->db->order_by("familia", 'ASC')->get_where($maintable, $where, $this->input->get('length'), $this->input->get('start'));
        } else {
          $qs = $this->db->order_by($maintable . "_nombre", 'ASC')->get_where($maintable, $where, $this->input->get('length'), $this->input->get('start'));
        }

        $qstotal = $this->db->order_by($maintable . "_nombre", 'ASC')->get_where($maintable, $where);
        $total = count($qstotal->result());
        if ($accion == 'ajaxmodel') {
          $pst = $this->input->post();
          if (isset($pst['name']) && intval($pst['name']) != 0) {
            $qmsm = $this->db->query("SELECT * FROM modelo WHERE modelo_id=?", array(intval($pst['name'])));
            foreach ($qmsm->result() as $r) {
              $t = time();
              $data = json_decode($r->modelo_data, true);
              echo "<div style='padding-bottom:20px;' id='model_" . $t . "'>";
              echo "<h5 style='background-color:#e3e3e3;padding:5px 5px;'>";
              echo "<input type='number' name='" . $pst['campo'] . "[" . $t . "][orden]' style='width:40px;padding:3px 1px;margin-right:4px;'>";
              echo $r->modelo_nombre . " <a class='btn eliminarbloque' data-id='model_" . $t . "'>X</a>";
              echo "</h5>";

              echo "<input type='hidden' name='" . $pst['campo'] . "[" . $t . "][tipo]' value='" . intval($pst['name']) . "'>";
              //print_r($data);
              foreach ($data as $kdt => $dt) {
                echo "<label style='display:block'>" . $dt['label'] . "</label>";
                //$kdt = str_replace(" ","_",$kdt);
                switch ($dt['tipo']) {
                  case 'textarea':
                    echo "<textarea name='" . $pst['campo'] . "[" . $t . "][" . $kdt . "]' class='form-control' style='height:200px;'></textarea>";
                    break;
                  case 'imagen':
                  case 'multiimagen':
                    echo "<input type='file' id='upfile_" . $kdt . "_" . $t . "' name='files[]' data-input='file_" . $kdt . "_" . $t . "'  data-url='/admin/imageupload/upfile_" . $kdt . "_" . $t . "' multiple>";
                    echo "<div id='divfile_" . $kdt . "_" . $t . "' class='row'>";

                    echo "</div>";
                    echo '<div id="progress' . $kdt . "_" . $t . ' class="progress">';
                    echo '<div class="progress-bar progress-bar-success cargando' . $kdt . "_" . $t . '"></div>';
                    echo '</div>';
?>
                    <script>
                      $(function() {
                        $('#upfile_<?php echo $kdt . "_" . $t; ?>').fileupload({
                          dataType: 'json',
                          progress: function(e, data) {
                            var progress = parseInt(data.loaded / data.total * 100, 10);
                            $(".cargando<?php echo $kdt . "_" . $t; ?>").html(progress + "%");
                          },
                          done: function(e, data) {
                            $.each(data.result.files, function(index, file) {
                              var html = $("#divfile_<?php echo $kdt . "_" . $t; ?>").html();
                              html = html + "<div class='col-md-3' data-img='" + file.name + "'>";
                              html = html + "<img src='" + file.url + "' style='width:100%'>";
                              html = html + "<input type='hidden' name='<?php echo $pst['campo'] . "[" . $t . "]"; ?>[<?php echo $kdt; ?>][]' id='file_<?php echo $kdt . "_" . $t; ?>' value='" + file.name + "'>";
                              html = html + "<a class='eliminafoto btn btn-danger' data-foto='" + file.name + "'><i class='mdi mdi-close'></i></a>";
                              html = html + "</div>";
                              //$('</p>').text(file.name).appendTo("#divfile_<?php echo $kdt . "_" . $t; ?>");
                              $("#divfile_<?php echo $kdt . "_" . $t; ?>").html(html);
                              $(".cargando<?php echo $kdt . "_" . $t; ?>").remove();
                            });
                          }
                        });
                      });
                    </script>
<?php
                    break;
                  case 'texto':
                  case 'video':
                  case 'url':
                    echo "<input type='text' name='" . $pst['campo'] . "[" . $t . "][" . $kdt . "]' class='form-control'>";
                    break;
                  case 'options':
                    echo "<div>";
                    foreach ($dt['opciones'] as $opciones) {
                      echo "<label><input type='radio' name='" . $pst['campo'] . "[" . $t . "][" . $kdt . "]'  value='" . $opciones . "'> " . $opciones . " </label> | ";
                    }
                    echo "</div>";
                    break;
                }
                echo "<div style='display:block;height:10px; width:100%'></div>";
              }
              echo "</div>";
            }
          }

          die();
        } elseif ($accion == 'ajax') {
          $rs = array();
          foreach ($qs->result() as $rss) {
            $item = array();
            foreach ($rss as $k => $v) {
              if (in_array($k, $list)) {
                //$item[]=$v;
                if ($k == 'fk_proyecto_id') {
                  //$item[]='proyecto';
                  $item[] = $this->db->query("SELEcT IFNULL(proyecto_nombre,'') as nombre FROM proyecto WHERE proyecto_id=" . intval($v))->row()->nombre;
                } else {
                  $item[] = $v;
                }
              }
            }
            $item[] = '<a href="/admin/' . $seccion . '/editar/' . ($rss->{$maintable . "_id"}) . '" class="btn btn-icon waves-effect waves-light btn-success"><i class="mdi mdi-pencil"></i></a> <a href="/admin/' . $seccion . '/eliminar/' . ($rss->{$maintable . "_id"}) . '" class="btn btn-icon waves-effect waves-light btn-danger consulta"><i class="mdi mdi-delete"></i></a>';
            $rs[] = $item;
            unset($item);
          }
          $dt = array();
          //$dt["draw"] = 1;
          $dt["recordsTotal"] = $total;
          $dt["recordsFiltered"] = $total;
          $dt["data"] = ($rs);
          echo json_encode($dt);
          die();
        } elseif ($accion == 'eliminar') {
          $seccion = $this->uri->segment(2);
          $accion = $this->uri->segment(3);
          $ide = $this->uri->segment(4);
          $this->db->query("DELETE FROM " . $maintable . " WHERE " . $maintable . "_id=?", array(intval($ide)));
          redirect("/admin/" . $seccion, 200);
          die();
        } elseif ($accion == 'editar' || $accion == 'create') {
          $pst = $this->input->post();

          if (is_array($pst) && !empty($pst) && isset($pst['procesarform'])) {
            //var_dump($pst);
            $ide = (isset($pst[$maintable . '_id'])) ? $pst[$maintable . '_id'] : 0;
            $sql = "";
            if ($ide != 0) {
              $sql = "UPDATE " . $maintable . " SET ";
            } else {
              $sql = "INSERT INTO " . $maintable . " SET ";
            }
            $datasql = array();
            $_x = 0;
            foreach ($fields as $kf => $f) {
              if ($kf == 'usuario_password') {
                $val = md5($pst[$kf]);
                if ($_x > 0) {
                  $sql .= ",";
                }
                $sql .= " " . $kf . "=?";
                $datasql[$kf] = $val;
                $_x++;
              } elseif (isset($pst[$kf])) {
                $val = $pst[$kf];
                if (is_array($val)) {
                  $val = json_encode($val);
                }
                if ($_x > 0) {
                  $sql .= ",";
                }
                $sql .= " " . $kf . "=?";
                $datasql[$kf] = $val;
                $_x++;
              }
              if (isset($pst["borrar_" . $kf]) && $pst["borrar_" . $kf] == 1) {
                $sql .= ", " . $kf . "=?";
                $datasql[$kf] = '';
              }
              //$rsi[$kf] = '';
            }
            if ($ide != 0) {
              $sql .= " WHERE " . $maintable . "_id=?";
              $datasql[] = $ide;
            }
            $this->db->query($sql, $datasql);
            //echo $this->db->last_query();
            if ($ide == 0) {
              $ide = $this->db->insert_id();
            }
            //archivos
            if (isset($_FILES)) {
              $this->load->library('upload');
              foreach ($_FILES as $k => $v) {
                if (isset($fields[$k]) && $v['name'] != '') {
                  $tipo = $fields[$k]['fieldcomponent'];
                  $filename = str_replace(" ", "", $v['name']);
                  $filename = $ide . "_" . time() . "_" . $filename;
                  $config = array();
                  $config['upload_path'] = '/home/atvarqui/public_html/upfiles/';
                  $config['file_name'] = $filename;
                  $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|webp';
                  $this->upload->initialize($config);
                  if ($this->upload->do_upload($k)) {
                    $this->db->query("UPDATE " . $maintable . " SET " . $k . "=? WHERE " . $maintable . "_id=?", array($filename, $ide));
                  } else {
                    echo $this->upload->display_errors();
                  }
                  if ($tipo == 'archivo') {
                  } else {
                  }
                }
              }
            }
            redirect("/admin/" . $seccion, 200);
            die();
          }
          $tituloform = "Nuevo ingreso";
          if ($accion == 'editar') {
            $tituloform = "Editar";
          }
          $editar = array();
          $rsi = array();
          $rsi[$maintable . "_id"] = 0;
          $qmsm = $this->db->query("SELECT * FROM " . $maintable . " WHERE " . $maintable . "_id=?", array(intval($ide)));
          foreach ($qmsm->result() as $r) {
            foreach ($r as $k_r => $_r) {
              $rsi[$k_r] = $_r;
            }
          }
          $this->data['modelos'] = array();
          $qmsmod = $this->db->query("SELECT * FROM modelo");
          foreach ($qmsmod->result() as $rmod) {
            $this->data['modelos'][] = (array)$rmod;
          }
          if ($qmsm->num_rows() == 0) {
            foreach ($fields as $kf => $f) {
              if (!isset($rs) || empty($rs)) {
                $rsi[$kf] = '';
              }
            }
          }
          $this->data['rs'] = $rsi;
          $this->data['tituloform'] = $tituloform;
          $this->load->view('admin/form', $this->data);
        } else {
          $this->load->view('admin/list', $this->data);
        }
      }
    }
  }
}
