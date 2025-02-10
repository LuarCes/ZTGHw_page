<?php

class Logeo extends CI_Model {

 

    function __construct() { 
        parent::__construct();
        $this->load->database();
    }

    
    function valIngresoAdmin($username, $pass){        
        $query = $this->db->get_where('users', [
            'username' => $username,
            'pass' => $pass
        ]);
            
            
            if($query->num_rows() == 1){
              return 'admin';
            } else{
                return 'no encontrado';
            }
    
    }

}