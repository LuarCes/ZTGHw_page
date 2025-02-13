<?php 
 
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/carrito.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/formCompra.css">
    <script src="<?= base_url(); ?>assets/js/carrito.js?v=<?= time(); ?>" defer></script>


    <title>ZTGHardware - Carrito</title>
</head>
  
<body>

    <div class="contenedor-form">
      
      <div class="datos-comprador">
        <form method='POST' action="<?= base_url(); ?>index.php/enviarForm">
            <h3>Datos del comprador / Forma de entrega</h3>
            <div class="datos-comp">
              <label for="nombre">Nombre*</label>
                <input type="text" class="form-control" name='nombre' id="nombre" placeholder="Nombre...">
            </div>
            <div class="datos-comp">
                <label for="apellido">Apellido*</label>
                <input type="text" class="form-control" name='apellido' id="apellido" placeholder="Apellido...">
            </div>
           


            <div class="datos-comp">
              <label for="email">Email*</label>
              <input type="email" class="form-control" name='email' id="email" placeholder="email...">
            </div>
            <div class="datos-comp">
              <label for="exampleTextarea">Mensaje</label>
              <textarea class="form-control" name='mensaje' id="mensaje" rows="3"></textarea>
            </div>
            
            <div class="datos-comp">
              <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
            </div>
            </form>
      </div>

      <div class="resumen-compra">
          <h3>Datos del carrito</h3>
          <div class="tabla_carrito_cont">
            <table class="cates">
                <tr>
                    <th>
                        <p>Producto</p>
                    </th>
                    <th>
                        <p>Precio</p>
                    </th>
                    <th>
                        <p>Cantidad</p>
                    </th>
                    <th>
                        <p>Total</p>
                    </th>
                </tr>
                <tbody id="carrito-productos"></tbody> 
            </table>
          </div> 

          <div class="total-pagar">
            <p> Total a pagar : $<span id="total-pagar">0.00</span> </p>
          </div>
      </div>

      


    </div>

    


    
    <script>
      window.onload = function() {
            mostrarCarritoForm();
        };
    </script>
   
</body>

</html>