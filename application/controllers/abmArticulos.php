<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbmArticulos extends CI_Controller {


    public function mostrarArticulos(){
        $this->load->model('Articulo');
        $data['productos'] = $this->Articulo->traerArticulos();

        $this->load->view('header');
		$this->load->view('articulos', $data);
        
	}

   

}