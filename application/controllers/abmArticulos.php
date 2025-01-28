<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbmArticulos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); // Carga el helper
    }


    public function mostrarArticulos(){
        $this->load->model('Articulo');
        $data['productos'] = $this->Articulo->traerArticulos();

        $msj['msj'] = '';
        $this->load->view('header',$msj);
		$this->load->view('articulos', $data);
        $this->load->view('footer');
	}

    public function mostrarCategoria($categoria){
        $this->load->model('Articulo');
        $data['productos'] = $this->Articulo->traerCategoria($categoria);

        $msj['msj'] = '';
        $this->load->view('header',$msj);
		$this->load->view('articulos', $data);
        $this->load->view('footer');
	}

   

}