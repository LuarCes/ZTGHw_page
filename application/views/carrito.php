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
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">
    <script src="<?= base_url(); ?>assets/js/filtro.js" defer></script>
    <script src="<?= base_url(); ?>assets/js/cartService.js" defer></script>

    <title>ZTGHardware - Carrito</title>
</head>
  
<body>

   <div class="tabla_carrito">
        <table class="cates">
            <tr id="cate-table">
                <th id="elimnar-col" width="8%">
                    <p>Eliminar</p>
                </th>
                <th id="img-col" width="8%">
                    <p>Imagen</p>
                </th>
                <th id="prod-col">
                    <p>Producto</p>
                </th>
                <th id="precio-col">
                    <p>Precio</p>
                </th>
                <th id="cant-col" width="10%">
                    <p>Cantidad</p>
                </th>
                <th id="total-col">
                    <p>Total</p>
                </th>
            </tr>
            <tbody id="carrito-productos"></tbody> 
        </table>
   </div>

    <div class="total-pagar">
        <p> Total a pagar : $<span id="total-pagar">0.00</span> </p>
        <button><a href="<?= base_url(); ?>index.php/verForm">Finalizar compra</a></button>
    </div>



   <script>
        window.onload = function() {
            mostrarCarrito();
        };

        const binIconUrl = "<?= base_url('assets/images/bin1.png') ?>";
        const baseUrl="<?= base_url(); ?>";
    </script>

</body>

</html>