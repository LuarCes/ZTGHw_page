<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InicioAdmin extends CI_Controller {
	
	
	public function index()
	{	
		
		$msj['msj'] = '';
		$this->load->view('inicioAdmin', $msj);
	}

	function __construct() { 
        parent::__construct();
        $this->load->helper('url');
    }


	public function ValidarUsuarioAdmin(){

		$name = $this->input->post('name', true);
        $pass = $this->input->post('pass', true);
	   
		$this->load->model('Logeo');
		$rol = $this->Logeo->valIngresoAdmin($name,$pass); 
		
	   
		if($rol == 'admin'){ 
        	$this->session->set_userdata('user',$rol);
			$this->load->model('Articulo');
			$data['productos'] = $this->Articulo->traerArticulos();


			$msj['msj'] = '';
			$this->load->view('headerAdmin', $msj);
			$this->load->view('inicio',$data);
			$this->load->view('footer');
		}
		else {
			$msj['msj'] = 'Usuario o contraseña incorrectos.';
			$this->load->view('header');
            $this->load->view('ups', $msj);
			$this->load->view('footer');
		}
	}

	public function usuarioAdmin(){
		$msj['msj'] = "";
		$this->load->view('headerAdmin');
		$this->load->view('inicio', $msj);
	}


}