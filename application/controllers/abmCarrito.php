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

	public function enviarForm() {
		$this->load->model('Articulo');
	
		$productosJSON = $this->input->post('productos');
		$productos = json_decode($productosJSON, true);
	
		if (empty($productos)) {
			return;
		}
	
		$errores = [];
		foreach ($productos as $producto) {
			$id = $producto['id'] ?? null;
			$cant = $producto['cantidad'] ?? null;
	
			if (!isset($id, $cant) || !is_numeric($id) || !is_numeric($cant)) {
				$errores[] = "Datos inválidos para el producto con ID $id.";
				continue;
			}
	
			$resultado = $this->Articulo->actualizarCantPostCompra($id, $cant);
			if (!$resultado) {
				$errores[] = "No se pudo actualizar el stock para el producto con ID $id.";
			}
		}
	
		if (empty($errores)) {
			$this->load->view('header', ['msj' => 'Compra confirmada. Stock actualizado.']);
			$this->load->view('compraConfirm');
			$this->load->view('footer');
		} else {
			echo json_encode(["success" => false, "errores" => $errores]);
		}
	}
	
    
		

}
