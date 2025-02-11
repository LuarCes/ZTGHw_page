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


function modificarArticulo($idOriginal,$idArt, $nombreArt, $descripcion, $precio, $stock, $categoria){
    $data = [];

    if (!empty($idArt)) $data['id'] = $idArt;
    if (!empty($nombreArt)) $data['nombre'] = $nombreArt;
    if (!empty($descripcion)) $data['descripcion'] = $descripcion;
    if (!empty($precio)) $data['precio'] = $precio;
    if (!empty($stock)) $data['stock'] = $stock;
    if (!empty($categoria)) $data['categoria'] = $categoria;

    if (!empty($data)) { // Solo actualiza si hay cambios
        $this->db->where('id', $idOriginal);
        $this->db->update('productos', $data);
    }
}

function eliminarArticulo($idArt){
    $consulta = $this->db->query("DELETE FROM productos WHERE productos.id = '$idArt'");
}

}