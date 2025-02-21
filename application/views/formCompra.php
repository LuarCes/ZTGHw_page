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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <script src="<?= base_url(); ?>assets/js/carrito.js?v=<?= time(); ?>" defer></script>


    <title>ZTGHardware - Carrito</title>
</head>
  
<body>

    <div class="contenedor-form">
      
      <div class="datos-comprador">
        <form action="<?= base_url(); ?>index.php/enviarForm" method="POST">
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

            <input type="hidden" name="productos" id="productos">

            
            <div class="datos-comp">
              <button class="btn btn-primary" type="submit" name="enviar" >Confirmar compra</button>
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
            <p> Total a pagar : <span id="total-pagar">0.00</span> </p>
          </div>
      </div>

      


    </div>

    


    
    <script>
      window.onload = function() {
            mostrarCarritoForm();
        };



       
        document.querySelector('form').addEventListener('submit', function (e) {
          const carrito = JSON.parse(localStorage.getItem('productos')) || [];

          if (carrito.length > 0) {
            document.getElementById('productos').value = JSON.stringify(carrito);
    
          } else {
            e.preventDefault();
            alert('El carrito está vacío.');
          }
        });

        

    </script>



   
</body>

</html>