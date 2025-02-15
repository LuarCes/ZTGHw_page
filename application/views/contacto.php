<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/contacto.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/footer.css">

    <script src="<?= base_url(); ?>assets/js/filtro.js" defer></script>
    <script src="<?= base_url(); ?>assets/js/cartService.js" defer></script>

    <title>ZTGHardware - Contacto</title>
</head>


<body>

   <div class="todo-cont">

    <div class="cuadrante" id="info-nosotros">
        <img class="img-cont" src="<?= base_url('assets/images/logo.png') ?>" width="25%">
        <p class="desc-nos">En ZTG Hardware, nos especializamos en ofrecer los mejores precios y un servicio de excelencia en tecnología. Desde nuestra fundación en 2023, trabajamos para abastecer a todo el país con productos de calidad, brindando asesoramiento personalizado y soluciones a medida.

            <br><b>📍 Catálogos Mayoristas Disponibles</b>
            <br>Explorá nuestra amplia variedad de productos y accedé a ofertas exclusivas para mayoristas.

            <br><b>💳 Opciones de Pago Flexibles</b>
            <br>Consultanos para conocer las diferentes formas de pago y financiamiento que tenemos para vos.

            <br><b>📩 ¿Tenés dudas? Estamos para ayudarte</b>
            <br>Contactanos y nuestro equipo de asesores te brindará toda la información que necesitás. 💻🕹️</p>

        <p class="atencion">Contactanos <b>Lun-Vier de 14:30 a 19:00hs y Sáb de 13 a 17hs</b></p>


        <div class="tarj-asesores">
            <div class="asesor" id="vale">
                <a href="https://wa.me/">
                <img class="img-cont" src="<?= base_url('assets/images/supportG.png') ?>" width="25%">
                <p>¡Hola! Soy <b>Valentina</b>, tu asesora en ZTG Hardware. Puedes encontrarme en los horarios de 
                    atención para ayudarte a encontrar los productos de tecnología que necesites! 
                </p>
                <p>Has click en mi tarjetita para contactarme 👋</p>
                </a>
            </div>
            <div class="asesor" id="sebas">
                <a href="https://wa.me/">
                <img class="img-cont" src="<?= base_url('assets/images/supportB.png') ?>" width="25%">
                <p>¡Hola! Soy <b>Sebastián</b>, tu asesor en ZTG Hardware. Si necesitas asesoramiento sobre hardware o 
                    periféricos, no dudes en contactarme dentro del horario de atención!</p>
                <p>Has click en mi tarjetita para contactarme 👋</p>
                </a>
            </div>
        </div>

        
    </div>

    <div class="cuadrante" id="info-contacto">
        <h3>Contacto</h3>
        <ul class="opcEnvio">
                <li><img src="<?=base_url('assets/images/whatsapp.png') ?>" width="3%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://wa.me/5492235679129">+54 9 2235 67-9129</a></li>
                <li><img src="<?=base_url('assets/images/facebook.png') ?>" width="3%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/ztghardware">Facebook ~ ZTG Hardware</a></li>
                <li><img src="<?=base_url('assets/images/instagram.png') ?>" width="3%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.instagram.com/ztgmayorista/">Instagram ~ ztgmayorista</a></li>
                <li><img src="<?=base_url('assets/images/tik-tok.png') ?>" width="3%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.tiktok.com/@ztghardware">Tik Tok ~ ztghardware</a></li>
                <li><img src="<?=base_url('assets/images/pin.png') ?>" width="3%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rivadavia 3188, Entrepiso, Mar del Plata</li>
        </ul> 
        <div class="mapouter-contact" ><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=400&amp;height=289&amp;hl=en&amp;q=Rivadavia 3188 oficina entrepiso, mar del plata&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div><style>.mapouter{position:relative;text-align:right;width:600px;height:289px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:289px;}.gmap_iframe {width:600px!important;height:289px!important;}</style></div>
        
            <form method='POST' action="<?= base_url(); ?>index.php/enviarForm">
            <h3>¡Envianos tu consulta!</h3>
            <div class="primario">
              <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name='nombre' id="nombre" placeholder="Nombre...">
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

   </div>

</body>

</html>