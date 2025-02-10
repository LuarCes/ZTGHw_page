<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/header.css">
    
</head>

     <header>
        <a href="<?= base_url(); ?>index.php/bienvenida"><img src="<?= base_url('assets/images/logo.png') ?>" width="80%"></a>
            <div class="buscador">
                <input type="search" class="form-control" name="s" id="" placeholder="Buscar producto..." required="">
            </div> 
            
            <div class="opciones-header">
                <ul class="header-list">
                    <li><a href="<?= base_url(); ?>index.php/bienvenida">Inicio</a></li>
                    <li><a href="<?= base_url(); ?>index.php/nuestrosProductos" >Productos</a></li>
                    <li><a href="<?= base_url(); ?>index.php/cargarArticulos" >Carga Prod</a></li>
                </ul>
            </div> 
    </header>
</html>