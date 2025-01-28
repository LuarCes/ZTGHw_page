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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	 public function __construct() {
        parent::__construct();
        $this->load->helper('url'); // Carga el helper
    }

	
	 public function index()
	{
		$this->load->model('Articulo');
		$data['productos'] = $this->Articulo->traerArticulos();


		$msj['msj'] = '';
		$this->load->view('header', $msj);
		$this->load->view('inicio',$data);
		$this->load->view('footer');
	}

	public function bienvenida()
	{
		$this->load->view('header');
		$this->load->view('inicio');
		$this->load->view('footer');
	}

	public function contacto()
	{
		$this->load->view('header');
		$this->load->view('contacto');
		$this->load->view('footer');
	}

	

}
