<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/footer.css">
</head>

<footer>
        
        <div class="forma-pago">
           <h3>Formas de pago</h3>
           <ul class="opcPago">
                <li><img src="<?= base_url('assets/images/banco.png') ?>" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transferencia</li>
                <li><img src="<?=base_url('assets/images/efectivo.png') ?>" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Efectivo</li>
                <li><img src="<?=base_url('assets/images/tarjeta.png') ?>" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tarjeta crédito o débito</li>
           </ul> 
        </div>
        <div class="forma-envio">
            <h3>Formas de envío</h3>
            <ul class="opcEnvio">
                <li><img src="<?=base_url('assets/images/shipped_411763.png') ?>" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Entrega a domicilio</li>
                <li><img src="<?=base_url('assets/images/pin.png') ?>" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Retiro en local</li>
            </ul> 
        </div>
        <div class="forma-contacto">
            <h3>Contacto</h3>
            <ul class="opcEnvio">
                <li><img src="<?=base_url('assets/images/whatsapp.png') ?>" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://wa.me/5492235679129">WhatsApp</a></li>
                <li><img src="<?=base_url('assets/images/facebook.png') ?>" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/ztghardware">Facebook</a></li>
                <li><img src="<?=base_url('assets/images/instagram.png') ?>" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.instagram.com/ztgmayorista/">Instagram</a></li>
                <li><img src="<?=base_url('assets/images/tik-tok.png') ?>" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.tiktok.com/@ztghardware">Tik Tok</a></li>
            </ul> 
        </div>
        <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=50&amp;height=150&amp;hl=en&amp;q=Rivadavia 3188 oficina entrepiso, mar del plata&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div><style>.mapouter{position:relative;text-align:right;width:100%;height:305px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:305px;}.gmap_iframe {height:305px!important;}</style></div>
        <div class="admin-icon"><a href="<?= base_url(); ?>index.php/inicioAdmin"><img src="<?=base_url('assets/images/admin1.png') ?>"></a></div>

</footer>