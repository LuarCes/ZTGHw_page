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
    
    function traerCategoria($categoria){
        $consulta = $this->db->query("SELECT * FROM productos WHERE categoria = '$categoria'");
        return $consulta;
   }
    

   function agregarArticulo($id,$nombre, $descripcion,$categoria, $precio, $stock, $destacado){
    $data = [
        'id' => $id,
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'categoria' => $categoria,
        'precio' => $precio,
        'stock' => $stock,
        'destacado' => $destacado ? 1 : 0 // Guardarlo como 1 o 0 en la BD
    ];

    $this->db->insert('productos', $data);
}

}