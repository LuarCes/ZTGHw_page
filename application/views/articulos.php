<?php
    $categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/muestraArt.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pagCargas.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">
    <script src="<?= base_url(); ?>assets/js/filtro.js" defer></script>
    <script src="<?= base_url(); ?>assets/js/cartService.js" defer></script>

    <title>ZTGHardware - Articulos</title>
</head>
  
<body>

    <div class="body-catalogo">

        <div class="bannerProd">
            
        </div>


        <div class="contenido" >

            <div class="filters">
                <h2>Filtros</h2>
                <div class="filter-group">
                    <button ><a href="<?= base_url(); ?>index.php/nuestrosProductos" >Todos los productos</a></button>
                    <h3>Ordenar por:</h3>
                    <ul>
                    <li><button id="desc" class="ordenar">Mayor precio</button></li>
                    <li><button id="asc" class="ordenar">Menor precio</button></li>
                    <li><button id="name" class="ordenar">Nombre</button></li>
                    </ul>
                </div>

                <div class="category-group">
                    <h3>Categorias:</h3>
                    <ul>
                    <li><button id="auri" class="categorizar">Auriculares</button></li>
                    <li><button id="mouse" class="categorizar">Mouse</button></li>
                    <li><button id="teclado" class="categorizar">Teclado</button></li>
                    <li><button id="camara" class="categorizar">Camara</button></li>
                    </ul>
                </div>
            
            </div>

            <div class="donde-prod" id="products-container">
                <?php
                    foreach($productos->result() as $producto){
                        $url_img = "assets/images/articulos/".$producto->id.".png"; ?>

                    <div class="card" data-price="<?= $producto->precio ?>" data-category="<?= $producto->categoria ?>">
                        <img class="card-img-top" src='<?= base_url().$url_img?>' alt="Card image" >
                        <div class="card-body">
                            <h4 class="card-title"> <?=  $producto->nombre  ?> / <?=  $producto->descripcion  ?> </h4>
                            <p class="card-text">Precio : $ <?=  $producto->precio  ?></p>
                            <button type="button" class="btn-agregar" id="boton" onclick='agregarAlCarrito(<?= json_encode($producto) ?>)'>Agregar</button>
                        </div>
                    </div>

                <?php
                }?>
            </div>


          

        </div>


    </div>

</body>

</html>