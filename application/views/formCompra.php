<?php 
 
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/carrito.css">
    <script src="<?= base_url(); ?>assets/js/filtro.js" defer></script>
    <script src="<?= base_url(); ?>assets/js/cartService.js" defer></script>

    <title>ZTGHardware - Carrito</title>
</head>
  
<body>

    <div class="contenedor-form">
      
      <div class="datos-comprador">
        <form method='POST' action="<?= base_url(); ?>index.php/enviarForm">
            <h3>Datos del comprador / Forma de entrega</h3>
            <div class="primario">
              <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name='nombre' id="nombre" placeholder="Nombre...">
              <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name='apellido' id="apellido" placeholder="Apellido...">
            </div>
           


            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name='email' id="email" placeholder="email...">
            </div>
            <div class="form-group">
              <label for="exampleTextarea">Mensaje</label>
              <textarea class="form-control" name='mensaje' id="mensaje" rows="3"></textarea>
            </div>
            
            <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
        </form>
      </div>

      <div class="resumen-compra">
          <div class="tabla_carrito">
            <table class="cates">
                <tr>
                    <th >
                        <p>Eliminar</p>
                    </th>
                    <th>
                        <p>Imagen</p>
                    </th>
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
      </div>
    
    </div>
    
   
</body>

</html>