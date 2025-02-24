<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="<?= base_url(); ?>assets/js/script.js" defer></script>
    <script src="<?= base_url(); ?>assets/js/categorizar.js" defer></script>
    <script src="<?= base_url(); ?>assets/js/cartService.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>ZTGHardware - Inicio</title>
    
</head>
<body>
   

    <main>
        <nav class="banner">
            <div class="capa">
               
            </div>
            <div class="info">
                <h1 class="titulo-banner">Bienvenidos a ZTG Hardware</h1>
                <p>Somos una distribuidora marplatense con el objetivo de ofrecerte los mejores precios y productos del mercado</p> 
                <p>¡CONSULTA NUESTRO CATÁLOGO MAYORISTA!</p>
            </div>
       </nav>

       <div class="small-banner">
            <div class="cuadrado" id="cuotas">
                <img src="<?= base_url('assets/images/pagos.png') ?>" width="60px">
                <p>Podés elegir entre múltiples medios de pago</p>
            </div>
            <div class="cuadrado" id="descuento">
                <img src="<?= base_url('assets/images/promocion.png') ?>" width="60px">
                <p>¡Consulta por precios mayoristas!</p>
            </div>
            <div class="cuadrado" id="envios">
                <img src="<?= base_url('assets/images/shipped_411763.png') ?>" width="60px">
                <p>Envíos a todo el país</p>
            </div>
            <div class="cuadrado" id="atencion">
                <img src="<?= base_url('assets/images/atencion.png') ?>" width="60px">
                <p>Contactanos Lun-Vier de 14:30 a 19:00hs y Sáb de 13 a 17hs</p>
            </div>
       </div>

       <div class="que-buscas">
            <h1 class="titulos">🔍 ¿Qué estás buscando? 🔎</h1>
            <div class="tabla">
                <table >
                    <tr class="fila" >
                        <th> <a href="<?= base_url(); ?>index.php/nuestrosProductos/Auriculares" id="auri" class="categorizar">                      
                            <img src="<?= base_url('assets/images/auriculares.png') ?>" width="20%">
                            <p>Auriculares</p></a>
                        </th>
                        <th><a href="<?= base_url(); ?>index.php/nuestrosProductos/Mouse" id="mouse" class="categorizar">
                            <img src="<?= base_url('assets/images/raton.png') ?>" width="20%">
                            <p>Mouse</p></a>
                        </th>
                        <th><a href="<?= base_url(); ?>index.php/nuestrosProductos/Teclado" id="teclado" class="categorizar">
                            <img src="<?= base_url('assets/images/teclado.png') ?>" width="20%">
                            <p>Teclado</p></a>
                        </th>
                       <th> <a href="<?= base_url(); ?>index.php/nuestrosProductos/Camara" id="Camara" class="categorizar">
                            <img src="<?= base_url('assets/images/camara-web.png') ?>" width="20%">
                            <p>Cámara</p></a>
                        </th>
                        <th><a href="<?= base_url(); ?>index.php/nuestrosProductos/Parlantes" id="parlantes" class="categorizar">
                            <img src="<?= base_url('assets/images/parlante.png') ?>" width="20%">
                            <p>Parlantes</p></a>
                        </th>
                    </tr>
                    <tr class="fila">
                        <th><a href="<?= base_url(); ?>index.php/nuestrosProductos/Cables" id="cables" class="categorizar">
                            <img src="<?= base_url('assets/images/cable.png')?>" width="20%">
                            <p>Cables</p></a>
                        </th>
                        <th><a href="<?= base_url(); ?>index.php/nuestrosProductos/Juego" id="Juego" class="categorizar">
                            <img src="<?= base_url('assets/images/estacion-de-juegos.png') ?>" width="20%">
                            <p>Videojuegos</p></a>
                        </th>
                        <th><a href="<?= base_url(); ?>index.php/nuestrosProductos/Joystick" id="Joystick" class="categorizar">
                            <img src="<?= base_url('assets/images/control.png') ?>" width="20%">
                            <p>Joystick</p></a>
                        </th>
                        <th><a href="<?= base_url(); ?>index.php/nuestrosProductos/Fundas" id="mouse" class="categorizar">
                            <img src="<?= base_url('assets/images/avatar.png') ?>" width="20%">
                            <p>Fundas</p></a>
                        </th>
                        <th><a href="<?= base_url(); ?>index.php/nuestrosProductos/Otros" id="otros" class="categorizar">
                            <img src="<?= base_url('assets/images/mas.png') ?>" width="20%">
                            <p>Otros</p></a>
                        </th>
                    </tr>
                  </table>
            </div>
           
       </div>

       <div class="destacados">
        <h1 class="titulos">🌟 Destacados 🌟</h1>
        <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel">
                <?php
                foreach ($productos as $producto) {
                    // Verificar si el producto es destacado
                    if ($producto->destacado) {
                        $url_img = "assets/images/articulos/" . $producto->id . ".png"; ?>
                        <li class="card" id="inicio-card">
                            <img class="card-img-top" id="img-inicio" src='<?= base_url() . $url_img ?>' alt="Card image" draggable="false">
                            <div class="card-body" id="card-body-inicio">
                                <h4 class="card-title" id="h4-inicio"> <?= $producto->nombre ?> </h4>
                                <p class="card-text" id="texto-inicio"> Precio : $ <?= number_format($producto->precio, 2, '.', ',') ?></p>
                                <div class="botones" id="boton-inicio">
                                    <button type="button" class="btn-agregar" id="boton-<?= $producto->id ?>" data-stock="<?= $producto->stock ?>" onclick='agregarAlCarrito(<?= json_encode($producto) ?>)'>Agregar</button>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                }
                ?>
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
       </div>

    </main>

    
</body>
</html>