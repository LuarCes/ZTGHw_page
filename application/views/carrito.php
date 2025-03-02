<?php

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/carrito.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">
    <script src="<?= base_url(); ?>assets/js/cartService.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>ZTGHardware - Carrito</title>
</head>
  
<body>

    <div class="cartel">
        <p>🎮 La compra mínima por la web debe ser de $100.000 🎮<br>o 12 unidades por artículo</p>
    </div>


   <div class="tabla_carrito">
        <table class="cates">
            <tr id="cate-table">
                <th id="elimnar-col" width="8%">
                    <p>Eliminar</p>
                </th>
                <th id="img-col" width="8%">
                    <p>Imagen</p>
                </th>
                <th id="prod-col" width="40%">
                    <p>Producto</p>
                </th>
                <th id="precio-col" width="10%">
                    <p>Precio</p>
                </th>
                <th id="cant-col" width="11%">
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
        <p> Total a pagar : <span id="total-pagar">0.00</span> </p>
        <button id="finalizar-compra-btn"><a href="<?= base_url(); ?>index.php/verForm">Finalizar compra</a></button>
    </div>



   <script>
        window.onload = function() {
            mostrarCarrito();
        };

        const binIconUrl = "<?= base_url('assets/images/bin1.png') ?>";
        const baseUrl="<?= base_url(); ?>";


        document.getElementById('finalizar-compra-btn').addEventListener('click', function (event) {
        const totalTexto = document.getElementById('total-pagar').textContent.replace(/\$/g, '').replace(/,/g, '');
        const total = parseFloat(totalTexto);

        const productos = JSON.parse(localStorage.getItem('productos')) || [];
        const cantidadTotal = productos.reduce((acum, producto) => acum + parseInt(producto.cantidad), 0);

       
        if (total < 100000 || cantidadTotal < 12) {
            event.preventDefault(); 

            let mensaje = '⚠️ Para finalizar la compra:\n';
            if (total < 100000) mensaje += '- El total debe ser de al menos $100.000.\n';
            if (cantidadTotal < 12) mensaje += '- Debe haber al menos 12 unidades en el carrito.';

            alert(mensaje);
        }
    });
    </script>



</body>

</html>