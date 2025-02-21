<?php
    $categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : null;

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/muestraArt.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">
    <script src="<?= base_url(); ?>assets/js/filtro.js" defer></script>
    <script src="<?= base_url(); ?>assets/js/cartService.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


    <title>ZTGHardware - Articulos</title>
</head>
  
<body>

    <div class="body-catalogo">


        <div class="contenido" >

            <div class="filters">
                <h2>Filtros</h2>
                <button class="todos-prod"><a href="<?= base_url(); ?>index.php/nuestrosProductos" >Todos los productos</a></button>
                <div class="filter-group">
                    
                    <h3>Ordenar por:</h3>
                    <ul>
                        <li><button id="desc" class="ordenar">Mayor precio</button></li>
                        <li><button id="asc" class="ordenar">Menor precio</button></li>
                    </ul>
                </div>

                <div class="category-group">
                    <h3>Categorias:</h3>
                    <ul>
                        <li><button id="auri" class="categorizar">Auriculares</button></li>
                        <li><button id="mouse" class="categorizar">Mouse</button></li>
                        <li><button id="teclado" class="categorizar">Teclado</button></li>
                        <li><button id="camara" class="categorizar">Camara</button></li>
                        <li><button id="parlantes" class="categorizar">Parlantes</button></li>
                        <li><button id="cables" class="categorizar">Cables</button></li>
                        <li><button id="vj" class="categorizar">Videojuegos</button></li>
                        <li><button id="joystick" class="categorizar">Joystick</button></li>
                        <li><button id="fundas" class="categorizar">Fundas</button></li>
                        <li><button id="otros" class="categorizar">Otros</button></li>
                    </ul>
                </div>
            
            </div>

            <div class="donde-prod" id="products-container">
                <?php
                    foreach($productos as $producto){
                        $url_img = "assets/images/articulos/".$producto->id.".png"; ?>

                    <div class="card" data-price="<?= $producto->precio ?>" data-category="<?= $producto->categoria ?>">
                        <img class="card-img-top" src='<?= base_url().$url_img?>' alt="Card image" >
                        <div class="card-body">
                            <h4 class="card-title"> <?=  $producto->nombre  ?> </h4>
                            <p class="card-text"> Precio : $ <?= number_format($producto->precio, 2, '.', ',') ?></p> 
                            <p>Stock: <?=  $producto->stock  ?> </p>
                        </div>
                        <div class="div-btn">
                            <button type="button" class="btn-agregar" id="boton-<?= $producto->id ?>" onclick='agregarAlCarrito(<?= json_encode($producto) ?>)'>Agregar</button>
                        </div>
                    </div>

                <?php
                }?>
            </div>


          

        </div>


    </div>

</body>

</html>