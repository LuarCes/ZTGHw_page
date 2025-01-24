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
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/carrito.css">
    <script src="<?= base_url(); ?>assets/js/filtro.js" defer></script>
    <script src="<?= base_url(); ?>assets/js/cartService.js" defer></script>

    <title>ZTGHardware - Carrito</title>
</head>
  
<body>

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

    <div>
        <p>Finalizar compra</p>
        
    </div>

   <script>
        // Llama a la función mostrarCarrito() cuando se cargue la página
        window.onload = function() {
            mostrarCarrito();
        };
    </script>

</body>

</html>