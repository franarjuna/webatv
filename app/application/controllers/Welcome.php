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
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		echo "api";
		die();
		
		/* $data = array();
		$uri = $this->input->server('REQUEST_URI');
		$uri = str_replace("//","/",$uri);
		$uri = str_replace("/sens-palermogreen","",$uri);
		$data['datadb'] = array();
		//echo $uri;
		$qcont = $this->db->query("SELECT * FROM contenido WHERE contenido_link=?",array($uri));
		//echo $this->db->last_query();
		foreach($qcont->result() as $rcont){
			$data['datadb'] = json_decode($rcont->contenido_contenido,true);
		}
		$this->load->view('paginas',$data); */
	}
	public function api()
	{
		$data = array();
		$post = $this->input->post();
		//$uri = $post['uri'];
		$euri = explode("/",$post['uri']);
		if(count($euri) > 1){
			$uri = "/".end($euri);
		}else{
			$uri = "/";
		}
		$uri = str_replace("//","/",$uri);
		//$uri = str_replace("/sens-palermogreen","",$uri);
		$data['datadb'] = array();
		//echo $uri;
		$qcont = $this->db->query("SELECT * FROM contenido WHERE contenido_link=? AND fk_proyecto_id=?",array($uri,$post['site']));
		//echo $this->db->last_query();
		foreach($qcont->result() as $rcont){
			$data['datadb'] = json_decode($rcont->contenido_contenido,true);
		}
		echo json_encode($data['datadb']);
		die(); 
		$this->load->view('paginas',$data);
	}
	public function unidade()
	{
		$data = array();
		$post = $this->input->post();

		$data['datadb'] = array();
		//echo $uri;
		$qcont = $this->db->query("SELECT * FROM unidad WHERE fk_proyecto_id=?",array($post['site']));
		//echo $this->db->last_query();
		foreach($qcont->result() as $rcont){
			$data['datadb'][] = $rcont;
		}
		echo json_encode($data['datadb']);
		die(); 
		$this->load->view('paginas',$data);
	}
	public function contacto(){
		$data = array();
		$data['nofloatinglogo'] =1;
		$this->load->view('contacto',$data);
	}

	public function unidade_s(){
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
		$post = $this->input->post();
		if($post['site'] == 1){
			$prefijo = "/sens-costa-rica/assets/planos/CR-";
		}else{
			$prefijo = "/sens-humboldt/assets/planos/HB-";
		}
		$data = array();
		$unidad = $this->uri->segment(2);
		$data['unidad'] = substr($unidad,1);

		$qs = $this->db->query("SELECT * FROM unidad WHERE unidad_codigo=? AND fk_proyecto_id=?",array($data['unidad'],$post['site']));
		foreach($qs->result() as $und){
			$data['info'] = $und;
		}
		$data['plano2'] = '';
		$data['plano3'] = '';
		$abspath = "/home/atvarqui/public_html";
		if(file_exists($abspath.$prefijo.$data['unidad']."-a.jpg")){
			$data['plano'] = $prefijo.$data['unidad']."-a.jpg";
		}elseif(file_exists($abspath.$prefijo.$data['unidad'].".jpg")){
			$data['plano'] = $prefijo.$data['unidad'].".jpg";
		}else{
			$data['plano'] = "";
		}
		if(file_exists($abspath.$prefijo.$data['unidad']."-b.jpg")){
			$data['plano2'] = $prefijo.$data['unidad']."-b.jpg";
		}
		if(file_exists($abspath.$prefijo.$data['unidad']."-c.jpg")){
			$data['plano3'] = $prefijo.$data['unidad']."-c.jpg";
		}
		$template = "unidad";
		echo json_encode($data);
		die(); 
		$this->load->view($template,$data);
	}
	public function _remap($method){
		$method = $this->uri->segment(1);
	    if (method_exists($this, $method)){
	        $this->$method();
	    }else{
	        $this->index();
	    }
	}
	
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
		$ancho = $this->uri->segment(3);
		$alto = $this->uri->segment(4);
		$img = $this->uri->segment(5);
	}
}
