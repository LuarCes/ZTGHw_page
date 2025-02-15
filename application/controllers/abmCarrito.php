<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbmCarrito extends CI_Controller {

	
	 public function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
    }

	
	 public function vistaCarrito()
	{
		$this->load->model('Articulo');
        $data['productos'] = $this->Articulo->traerArticulos();

		$msj['msj'] = '';
		$this->load->view('header', $msj);
		$this->load->view('carrito',$data);
		$this->load->view('footer');
	}

	public function vistaForm()
	{
		$this->load->model('Carrito');


		$msj['msj'] = '';
		$this->load->view('header', $msj);
		$this->load->view('formCompra');
		$this->load->view('footer');
	}

	public function enviarForm(){
		
	
		// Confirmación de la compra
		$msj['msj'] = 'Compra confirmada. Stock actualizado.';
		$this->load->view('header', $msj);
		$this->load->view('compraConfirm');
		$this->load->view('footer');
    }
    
		

}
