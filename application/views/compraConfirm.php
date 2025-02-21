<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/confirmCompra.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>¡Muchas gracias! ~ ZTG Hardware</title>
</head>
<body>

    <div class="contenedor">
        <div class="izquierda">

        </div>

        <div class="derecha">
            <p id="gracias">🎮¡¡ Muchas gracias por 🎮 <br>tu compra !!</p>
            <p id="comun">¡¡ Muy pronto nos comunicaremos con vos !!<br>🎉🎉🎉🎉🎉</p>
            <p>Mientras tanto podés seguir explorando nuestro catálogo o comunicarte con nuestros asesores ante <br> cualquier duda </p>
            <div class="botones">
                <a href="<?= base_url(); ?>index.php/nuestrosProductos">Seguir explorando</a>
                <a href="<?= base_url(); ?>index.php/contacto">Contacto</a>
            </div>
        </div>

    </div>

    


    <script>
    window.onload = function() {
            localStorage.clear();
            console.log('localStorage ha sido vaciado');
        }
    </script>



</body>
</html>

