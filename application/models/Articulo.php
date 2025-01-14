<?php

class Articulo extends CI_Model {

    function __construct() { 
        parent::__construct();
        $this->load->database();
    }



   function traerArticulos(){
        $query=$this->db->get('productos');
        if($query->num_rows()>0){
            return $query;
        }else{
            return null;
        }
    }
    
    function traerArticulo($idProd){
         $consulta = $this->db->query("SELECT * FROM productos WHERE id = '$idProd'");
         return $consulta->row();
    }
    
   


}