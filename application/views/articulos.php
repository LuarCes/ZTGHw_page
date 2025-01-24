<?php
/*esta vista va a recibir $data['articulos']
por parametros, y se llega a travez del boton de la cabecera
esto deberia mostrarse en algo mas parecido a una tabla*/
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
                    <h3>Ordenar por:</h3>
                    <ul>
                    <li><button id="desc" class="ordenar">Mayor precio</button></li>
                    <li><button id="asc" class="ordenar">Menor precio</button></li>
                    <li><button id="name" class="ordenar">Nombre</button></li>
                    </ul>
                </div>
            
            </div>

            <div class="donde-prod" id="products-container">
                <?php
                    foreach($productos->result() as $producto){
                        $url_img = "assets/images/articulos/".$producto->id.".png"; ?>

                    <div class="card" data-price="<?= $producto->precio ?>">
                        <img class="card-img-top" src='<?= base_url().$url_img?>' alt="Card image" >
                        <div class="card-body">
                            <h4 class="card-title"> <?=  $producto->nombre  ?> / <?=  $producto->descripcion  ?> </h4>
                            <p class="card-text">Precio : $ <?=  $producto->precio  ?></p>
                            <div class="botones"><a><button type="button" class="btn-comprar" id="boton">Comprar</button></a><a><button type="button" class="btn-agregar" id="boton" onclick='agregarAlCarrito(<?= json_encode($producto) ?>)'>Agregar</button></a></div>
                        </div>
                    </div>

                <?php
                }?>
            </div>

          

        </div>


    </div>

</body>

</html>