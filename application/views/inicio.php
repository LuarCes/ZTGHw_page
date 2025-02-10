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

    <title>ZTG Hardware - Inicio</title>
    
</head>
<body>
   

    <main>
        <nav class="banner">
            <div class="capa">
               
            </div>
            <div class="info">
                <h1 class="titulo-banner">Bienvenidos a ZTG Hardware</h1>
                <p>Somos una distribuidora marplatense con el objetivo de ofrecerte los mejores precios y productos del mercado</p> 
                <p>¡Consulta nuestro catálogo mayorista y arma tu PC ideal!</p>
            </div>
       </nav>

       <div class="small-banner">
            <div class="cuadrado" id="cuotas">
                <img src="<?= base_url('assets/images/pagos.png') ?>" width="20%">
                <p>Podés elegir entre múltiples medios de pago</p>
            </div>
            <div class="cuadrado" id="descuento">
                <img src="<?= base_url('assets/images/promocion.png') ?>" width="20%">
                <p>¡Consulta por precios mayoristas!</p>
            </div>
            <div class="cuadrado" id="envios">
                <img src="<?= base_url('assets/images/shipped_411763.png') ?>" width="20%">
                <p>Envíos a todo el país</p>
            </div>
            <div class="cuadrado" id="atencion">
                <img src="<?= base_url('assets/images/atencion.png') ?>" width="20%">
                <p>Contactanos Lun-Vier de 14:30 a 19:00hs y Sáb de 13 a 17hs</p>
            </div>
       </div>

       <div class="que-buscas">
            <h2>¿Qué estás buscando?</h2>
            <div class="tabla">
                <table >
                    <tr class="fila" >
                        <th>                       
                            <img src="<?= base_url('assets/images/auriculares.png') ?>" width="20%">
                            <p><a href="<?= base_url(); ?>index.php/nuestrosProductos/Auriculares" id="auri" class="categorizar">Auriculares</a></p>
                        </th>
                        <th>
                            <img src="<?= base_url('assets/images/raton.png') ?>" width="20%">
                            <p><a href="<?= base_url(); ?>index.php/nuestrosProductos/Mouse" id="mouse" class="categorizar">Mouse</a></p>
                        </th>
                        <th>
                            <img src="<?= base_url('assets/images/teclado.png') ?>" width="20%">
                            <p><a href="<?= base_url(); ?>index.php/nuestrosProductos/Teclado" id="teclado" class="categorizar">Teclado</a></p>
                        </th>
                        <th>
                            <img src="<?= base_url('assets/images/camara-web.png') ?>" width="20%">
                            <p><a href="<?= base_url(); ?>index.php/nuestrosProductos/Camara" id="Camara" class="categorizar">Cámara</a></p>
                        </th>
                        <th>
                            <img src="<?= base_url('assets/images/parlante.png') ?>" width="20%">
                            <p><a href="<?= base_url(); ?>index.php/nuestrosProductos/Parlante" id="parlantes" class="categorizar">Parlantes</a></p>
                        </th>
                    </tr>
                    <tr class="fila">
                        <th>
                            <img src="<?= base_url('assets/images/consola-de-juego.png')?>" width="20%">
                            <p><a href="<?= base_url(); ?>index.php/nuestrosProductos/Consola" id="consola" class="categorizar">Consola</a></p>
                        </th>
                        <th>
                            <img src="<?= base_url('assets/images/estacion-de-juegos.png') ?>" width="20%">
                            <p><a href="<?= base_url(); ?>index.php/nuestrosProductos/Juego" id="Juego" class="categorizar">Videojuegos</a></p>
                        </th>
                        <th>
                            <img src="<?= base_url('assets/images/control.png') ?>" width="20%">
                            <p><a href="<?= base_url(); ?>index.php/nuestrosProductos/Joystick" id="Joystick" class="categorizar">Joystick</a></p>
                        </th>
                        <th>
                            <img src="<?= base_url('assets/images/avatar.png') ?>" width="20%">
                            <p><a href="<?= base_url(); ?>index.php/nuestrosProductos/Fundas" id="mouse" class="categorizar">Fundas</a></p>
                        </th>
                        <th>
                            <img src="<?= base_url('assets/images/mas.png') ?>" width="20%">
                            <p><a href="<?= base_url(); ?>index.php/nuestrosProductos/Otros" id="otros" class="categorizar">Otros</a></p>
                        </th>
                    </tr>
                  </table>
            </div>
           
       </div>

       <div class="destacados">
        <h2>Destacados</h2>
        <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel">
                <?php
                foreach ($productos->result() as $producto) {
                    // Verificar si el producto es destacado
                    if ($producto->destacado) {
                        $url_img = "assets/images/articulos/" . $producto->id . ".png"; ?>
                        <li class="card" id="inicio-card">
                            <img class="card-img-top" id="img-inicio" src='<?= base_url() . $url_img ?>' alt="Card image" draggable="false">
                            <div class="card-body" id="card-body-inicio">
                                <h4 class="card-title" id="h4-inicio"> <?= $producto->nombre ?> </h4>
                                <p class="card-text" id="texto-inicio">Precio : $ <?= $producto->precio ?></p>
                                <div class="botones" id="boton-inicio">
                                    <button type="button" class="btn-agregar" id="boton" onclick='agregarAlCarrito(<?= json_encode($producto) ?>)'>Agregar</button>
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