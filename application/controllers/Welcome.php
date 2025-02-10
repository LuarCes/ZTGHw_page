<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	 public function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
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
		$this->load->model('Articulo');
		$data['productos'] = $this->Articulo->traerArticulos();

		$msj['msj'] = '';
		if($this->session->userdata('user')=='admin'){
			$this->load->view('headerAdmin',$msj);
		} else {
			$this->load->view('header',$msj);
		}

		$this->load->view('inicio',$data);
		$this->load->view('footer');
	}





	public function contacto()
	{
		$this->load->view('header');
		$this->load->view('contacto');
		$this->load->view('footer');
	}


	

}
