<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array();
		$seg = $this->uri->segment(1);
		$seg2 = $this->uri->segment(2);
		$uri = $this->input->server('REQUEST_URI');
		$data['datadb'] = array();
		//echo $uri;
		$qcont = $this->db->query("SELECT * FROM contenido WHERE contenido_link=?",array($uri));
		//echo $this->db->last_query();
		foreach($qcont->result() as $rcont){
			$data['datadb'] = json_decode($rcont->contenido_contenido,true);
		}

		if($seg == ''){

		}




		$this->load->view('paginas',$data);
	}
	public function contacto(){
		$data = array();
		$data['nofloatinglogo'] =1;
		$this->load->view('contacto',$data);
	}

	public function unidades(){
		$data = array();
		$data['unidades'] = $this->db->query("SELECT * FROM unidad");
		$this->load->view('unidades',$data);
	}
	public function pisos(){
		$data = array();
		$piso = $this->uri->segment(2);
		$template = "pisos/".$piso;
		$this->load->view($template,$data);
	}
	public function unidad(){
		$data = array();
		$unidad = $this->uri->segment(2);
		$data['unidad'] = substr($unidad,1);

		$qs = $this->db->query("SELECT * FROM unidad WHERE unidad_codigo=?",array($data['unidad']));
		foreach($qs->result() as $und){
			$data['info'] = $und;
		}
		$data['plano2'] = '';
		$data['plano3'] = '';

		if(file_exists($_SERVER['DOCUMENT_ROOT']."/assets/img/planos/".$data['unidad'].".jpg")){
			$data['plano'] = "assets/img/planos/".$data['unidad'].".jpg";
		}else{
			$data['plano'] = "assets/img/planos/planoejemplo.png";
		}
		if(file_exists($_SERVER['DOCUMENT_ROOT']."/assets/img/planos/".$data['unidad']."_2.jpg")){
			$data['plano2'] = "assets/img/planos/".$data['unidad']."_2.jpg";
		}
		if(file_exists($_SERVER['DOCUMENT_ROOT']."/assets/img/planos/".$data['unidad']."_3.jpg")){
			$data['plano3'] = "assets/img/planos/".$data['unidad']."_3.jpg";
		}
		$template = "unidad";
		$this->load->view($template,$data);
	}
	public function _remap($method){
		$method = $this->uri->segment(1);

	    if (method_exists($this, $method)){
	        $this->$method();
	    }
	    else{
	        $this->index();
	    }
	}
	/*public function aboutus()
	{
		$data = array();
		$data['cfg'] = $this->db->query("SELECT * FROM cfg LIMIT 1")->row();
		if(file_exists($_SERVER['DOCUMENT_ROOT']."/upfiles/".$data['cfg']->cfg_fondoabout)){
			$data['fondo'] = "/upfiles/".$data['cfg']->cfg_fondoabout;
		}else{
			$data['fondo'] = "http://www.estudiofbdi.com/upfiles/".$data['cfg']->cfg_fondoabout;
		}
		$data['section'] = "aboutus";
		$data['aboutus'] = array();
		$x=1;
		$qs = $this->db->query("SELECT * FROM aboutus WHERE aboutus_activo = '1' AND aboutus_destacado != '1' ORDER BY aboutus_orden");
		foreach($qs->result() as $row){
			$data['aboutus'][$x][$row->aboutus_id] = (array)$row;
			$x++;
			if($x==5){
				$x=1;
			}
		}
		$this->load->view('aboutus',$data);
	}
	public function explora()
	{
		$data = array();
			$data['cfg'] = $this->db->query("SELECT * FROM cfg LIMIT 1")->row();
			if(file_exists($_SERVER['DOCUMENT_ROOT']."/upfiles/".$data['cfg']->cfg_fondoexplora)){
				$data['fondo'] = "/upfiles/".$data['cfg']->cfg_fondoexplora;
			}else{
				$data['fondo'] = "http://www.estudiofbdi.com/upfiles/".$data['cfg']->cfg_fondoexplora;
			}
		$data['section'] = "work";
		if($this->uri->segment(1) == 'detail'){
			$url = $this->uri->segment(2);
			$urlexp = explode("-",$url);
			$id = end($urlexp);
			$qs = $this->db->query("SELECT * FROM contenido WHERE contenido_id=?",array(intval($id)));
			foreach($qs->result() as $r){
				$data['contenido'] = (array)$r;
				$titulos = json_decode($r->contenido_campos);
				$datos = json_decode($r->contenido_datos);
			}
			$data['galeria'] = array();
			$qs = $this->db->query("SELECT * FROM galeria1 WHERE fk_contenido_id=? ORDER BY galeria1_orden",array(intval($id)));
			foreach($qs->result() as $r){
				$data['galeria'][] = (array)$r;
			}
			$this->load->view('detail',$data);
		}else{
			$works = array();
			$qs = $this->db->query("SELECT * FROM contenido WHERE contenido_tipo='E' AND contenido_activo=1 ORDER BY contenido_orden");
			foreach($qs->result() as $r){
				$works[] = $r;
			}
			$data['works'] = $works;
			$this->load->view('explora',$data);
		}
	}

	public function work()
	{
		$data = array();
			$data['cfg'] = $this->db->query("SELECT * FROM cfg LIMIT 1")->row();
			if(file_exists($_SERVER['DOCUMENT_ROOT']."/upfiles/".$data['cfg']->cfg_fondowork)){
				$data['fondo'] = "/upfiles/".$data['cfg']->cfg_fondowork;
			}else{
				$data['fondo'] = "http://www.estudiofbdi.com/upfiles/".$data['cfg']->cfg_fondowork;
			}

		$data['section'] = "work";
		if($this->uri->segment(1) == 'detail'){
			$url = $this->uri->segment(2);
			$urlexp = explode("-",$url);
			$id = end($urlexp);
			$qs = $this->db->query("SELECT * FROM contenido WHERE contenido_id=?",array(intval($id)));
			foreach($qs->result() as $r){
				$data['contenido'] = (array)$r;
				$titulos = json_decode($r->contenido_campos);
				$datos = json_decode($r->contenido_datos);
			}
			$data['galeria'] = array();
			$qs = $this->db->query("SELECT * FROM galeria1 WHERE fk_contenido_id=? ORDER BY galeria1_orden",array(intval($id)));
			foreach($qs->result() as $r){
				$data['galeria'][] = (array)$r;
			}
			$this->load->view('detail',$data);
		}else{
			$works = array();
			$qs = $this->db->query("SELECT * FROM contenido WHERE contenido_tipo='W' AND contenido_activo=1 ORDER BY contenido_orden");
			foreach($qs->result() as $r){
				$works[] = $r;
			}
			$data['works'] = $works;
			$this->load->view('work',$data);
		}

	}

	public function editorial()
	{
		$data = array();
			$data['cfg'] = $this->db->query("SELECT * FROM cfg LIMIT 1")->row();
			if(file_exists($_SERVER['DOCUMENT_ROOT']."/upfiles/".$data['cfg']->cfg_fondowork)){
				$data['fondo'] = "/upfiles/".$data['cfg']->cfg_fondowork;
			}else{
				$data['fondo'] = "http://www.estudiofbdi.com/upfiles/".$data['cfg']->cfg_fondowork;
			}

		$data['section'] = "work";
		if($this->uri->segment(1) == 'detail'){
			$url = $this->uri->segment(2);
			$urlexp = explode("-",$url);
			$id = end($urlexp);
			$qs = $this->db->query("SELECT * FROM contenido WHERE contenido_id=?",array(intval($id)));
			foreach($qs->result() as $r){
				$data['contenido'] = (array)$r;
				$titulos = json_decode($r->contenido_campos);
				$datos = json_decode($r->contenido_datos);
			}
			$data['galeria'] = array();
			$qs = $this->db->query("SELECT * FROM galeria1 WHERE fk_contenido_id=? ORDER BY galeria1_orden",array(intval($id)));
			foreach($qs->result() as $r){
				$data['galeria'][] = (array)$r;
			}
			$this->load->view('detail',$data);
		}else{
			$works = array();
			$qs = $this->db->query("SELECT * FROM contenido WHERE contenido_tipo='N' AND contenido_activo=1 ORDER BY contenido_orden");
			foreach($qs->result() as $r){
				$works[] = $r;
			}
			$data['works'] = $works;
			$this->load->view('work',$data);
		}

	}*/
	public function e404(){
		$method = $this->uri->segment(1);

	    if (method_exists($this, $method)){
	        $this->$method();
	    }
	    else{
	        $this->index();
	    }
	}
	public function img(){
		$ancho = $this->uri->segment(2);
		$alto = $this->uri->segment(3);
		$img = $this->uri->segment(4);
	}
}
