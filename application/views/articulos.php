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
    <title>ZTGHardware - Articulos</title>
</head>
  
<body>

    <div class="body-catalogo">

        <div class="bannerProd">
            <img src="<?= base_url(); ?>assets/images/banner1.png" width='100%' alt="Banner de la página">
            <div class="titulo" id="deBanner">
                <h3 id="muestraTitulo" align="center">Productos</h3>
            </div>
        </div>


        <div class="contenido" >
            <div class="categorias">
                Aca van la lista de filtros
            </div>

            <div class="donde-prod">
                <?php
                    foreach($productos->result() as $producto){
                        $url_img = "assets/images/articulos/".$producto->id.".png"; ?>

                    <div class="card">
                        <img class="card-img-top" src='<?= base_url().$url_img?>' alt="Card image" >
                        <div class="card-body">
                            <h4 class="card-title"> <?=  $producto->nombre  ?></h4>
                            <p class="card-text">Descr :  <?=  $producto->descripcion  ?></p>
                            <p class="card-text">Precio : $ <?=  $producto->precio  ?></p>
                        </div>
                    </div>

                <?php
                }?>
            </div>

          

        </div>


    </div>

</body>

</html>