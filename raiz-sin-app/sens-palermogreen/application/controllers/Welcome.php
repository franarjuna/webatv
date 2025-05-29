<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
	function __construct()
	{
		parent::__construct();
		if (isset($_GET['utm_source'])) {
			$_SESSION['utm_source'] = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
			$_SESSION['utm_medium'] = isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '';
			$_SESSION['utm_campaign'] = isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '';
			$_SESSION['utm_term'] = isset($_GET['utm_term']) ? $_GET['utm_term'] : '';
			$_SESSION['utm_content'] = isset($_GET['utm_content']) ? $_GET['utm_content'] : '';
		}
		if (isset($_GET['vs'])) {
			var_dump($_SESSION);
			die();
		}
	}
	public function index()
	{
		$data = array();
		$uri = $this->input->server('REQUEST_URI');
		$uri = str_replace("//", "/", $uri);
		$uri = str_replace("/sens-palermogreen/index.php", "/", $uri);
		$uri = str_replace("/sens-palermogreen/index", "/", $uri);
		$uri = str_replace("/sens-palermogreen", "", $uri);
		$_uri = explode("?", $uri);
		$uri = $_uri[0];
		$data['datadb'] = array();
		//echo $uri;
		$qcont = $this->db->query("SELECT * FROM contenido WHERE contenido_link=?", array($uri));
		foreach ($qcont->result() as $rcont) {
			$data['datadb'] = json_decode($rcont->contenido_contenido, true);
		}
		$this->load->view('paginas', $data);
	}
	public function contacto()
	{
		$data = array();
		$data['nofloatinglogo'] = 1;
		$this->load->view('contacto', $data);
	}

	public function unidades()
	{
		$data = array();
		$data['unidades'] = $this->db->query("SELECT * FROM unidad");
		$this->load->view('unidades', $data);
	}
	public function pisos()
	{
		$data = array();
		$piso = $this->uri->segment(2);
		$template = "pisos/" . $piso;
		$this->load->view($template, $data);
	}
	public function unidad()
	{
		$data = array();
		$unidad = $this->uri->segment(2);
		$data['unidad'] = substr($unidad, 1);

		$qs = $this->db->query("SELECT * FROM unidad WHERE unidad_codigo=?", array($data['unidad']));
		foreach ($qs->result() as $und) {
			$data['info'] = $und;
		}
		$data['plano2'] = '';
		$data['plano3'] = '';

		if ($data['info']->plano1 != '') {
			$data['plano'] = "https://sensapp.atvarquitectos.com/upfiles/" . $data['info']->plano1;
		} elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . "/sens-palermogreen/assets/img/planos/" . $data['unidad'] . ".jpg")) {
			$data['plano'] = base_url() . "assets/img/planos/" . $data['unidad'] . ".jpg";
		} else {
			$data['plano'] = base_url() . "assets/img/planos/planoejemplo.png";
		}

		if ($data['info']->plano2 != '') {
			$data['plano2'] = "https://sensapp.atvarquitectos.com/upfiles/" . $data['info']->plano2;
		} elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . "/sens-palermogreen/assets/img/planos/" . $data['unidad'] . "_2.jpg")) {
			$data['plano2'] = base_url() . "assets/img/planos/" . $data['unidad'] . "_2.jpg";
		}

		if ($data['info']->plano3 != '') {
			$data['plano3'] = "https://sensapp.atvarquitectos.com/upfiles/" . $data['info']->plano3;
		} elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . "/sens-palermogreen/assets/img/planos/" . $data['unidad'] . "_3.jpg")) {
			$data['plano3'] = base_url() . "assets/img/planos/" . $data['unidad'] . "_3.jpg";
		}
		$template = "unidad";
		$this->load->view($template, $data);
	}
	public function _remap($method)
	{
		$method = $this->uri->segment(1);
		if (method_exists($this, $method)) {
			$this->$method();
		} else {
			$this->index();
		}
	}

	public function e404()
	{
		$method = $this->uri->segment(1);

		if (method_exists($this, $method)) {
			$this->$method();
		} else {
			$this->index();
		}
	}
	public function img()
	{
		$ancho = $this->uri->segment(3);
		$alto = $this->uri->segment(4);
		$img = $this->uri->segment(5);
	}
}
