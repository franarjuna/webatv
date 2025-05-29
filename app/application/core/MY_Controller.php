<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Main Controller
 */
class MY_Controller extends CI_Controller {
  public $data = array();
  public $sidebar = array();
  public function __construct()
  {
    parent::__construct();
    $this->data['error'] = 'Acceso';
    $pst = $this->input->post();
    if(isset($pst['loginusuario']) && isset($pst['loginpass'])){
      $email = $pst['loginusuario'];
      $string = $pst['loginpass'];
      /*if(function_exists('mcrypt_encrypt')){
        $pass = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5("a85AeW7tozx96HgQid8w69zKYT3W1dp6"), $string, MCRYPT_MODE_CBC, md5("a85AeW7tozx96HgQid8w69zKYT3W1dp6")));
      }else{

      }*/
        $pass = md5($string);
      $qs = $this->db->query("SELECT * FROM usuario WHERE usuario_mail=? AND usuario_password=?",array($email,$pass));
      if($qs->num_rows() > 0){
        foreach($qs->result() as $rus){
          $_SESSION['cid'] = $rus->usuario_id;
        }
      }else{
        $this->data['error'] = 'Usuario inexistente o incorrecto';
      }

    }

    $sidebar = array();
    if(isset($_SESSION['cid']) && intval($_SESSION['cid'])!=0){
      $qs = $this->db->query("SELECT * FROM menuadmin m JOIN menucategoria mc ON m.fk_menucategoria_id=mc.menucategoria_id");
      foreach($qs->result() as $r){
        $sidebar[$r->menucategoria_nombre][] = (array)$r;
      }
      $qdataus = $this->db->query("SELECT * FROM usuario WHERE usuario_id=?",array(intval($_SESSION['cid'])));
      foreach($qdataus->result() as $r){
        $this->data['user'] = $r;
      }
    }
    $this->data['sidebar'] = $sidebar;

  }
} ?>
