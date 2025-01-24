<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbmCarrito extends CI_Controller {

	
	 public function __construct() {
        parent::__construct();
        $this->load->helper('url'); // Carga el helper
    }

	
	 public function vistaCarrito()
	{
		$this->load->model('Carrito');


		$msj['msj'] = '';
		$this->load->view('header', $msj);
		$this->load->view('carrito');
		$this->load->view('footer');
	}



}
