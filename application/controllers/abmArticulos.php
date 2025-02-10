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
        if($this->session->userdata('user') == 'admin'){
            $this->load->view('headerAdmin',$msj);
        } else {
           
            $this->load->view('header',$msj);
        }

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


    public function pestañaArticulos(){
        $this->load->model('Articulo');
        $data['articulos'] = $this->Articulo->traerArticulos();
        
        $msj['msj'] = '';
        $this->load->view('headerAdmin',$msj);
        $this->load->view('pestArticulos', $data);
        $this->load->view('footer');
    }
   

    public function crearArticulo(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio= $_POST['precio'];
        $stock= $_POST['stock'];

        $destacado = isset($_POST['destacado']) && $_POST['destacado'] === "Si" ? true : false;

        $categoria= $_POST['categoria'];

        $this->load->model('Articulo');
        $this->Articulo->agregarArticulo($id,$nombre, $descripcion,$categoria, $precio, $stock, $destacado);
        

        // Obtiene la información del archivo subido
        $nombreArchivo = $_FILES['imagen']['name'];
        $infoArchivo = pathinfo($nombreArchivo);
        $extension = 'png';
        $rutaTemporalImagen = $_FILES['imagen']['tmp_name'];
        $tipoImagen = $_FILES['imagen']['type'];
        // Mueve la imagen a la carpeta de destino
        $rutaImagenDestino = './assets/images/articulos/'.$id.'.'.$extension;
        move_uploaded_file($rutaTemporalImagen, $rutaImagenDestino);

        $this->pestañaArticulos();
    }

    public function confirmarModificacion($id){
        
        $this->load->model('Articulo');
        $data['articulo'] = $this->Articulo->traerArticulo($id);
    
        $this->load->view('headerAdmin');
        $this->load->view('modificarArticulo', $data);
        $this->load->view('footer');
    }

    public function modificarArticulo($id){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        
        $this->load->model('Articulo');
        $this->Articulo->modificarArticulo($id, $nombre, $descripcion, $precio, $stock);

        // Borramos el archivo de nuestros assets
        unlink('./assets/imagenes/articulos/'.$id.'.jpg');
        // Obtiene la información del archivo subido
        $nombreArchivo = $_FILES['imagen']['name'];
        $infoArchivo = pathinfo($nombreArchivo);
        $extension = $infoArchivo['extension'];
        $rutaTemporalImagen = $_FILES['imagen']['tmp_name'];
        $tipoImagen = $_FILES['imagen']['type'];
        // Mueve la imagen a la carpeta de destino
        $rutaImagenDestino = './assets/imagenes/articulos/'.$id.'.'.$extension;
        move_uploaded_file($rutaTemporalImagen, $rutaImagenDestino);


        $this->pestañaArticulos();
    }


    public function eliminarArticulo($id){
        $this->load->model('Articulo');
        $this->Articulo->eliminarArticulo($id);
        $this->pestañaArticulos();
    }


}