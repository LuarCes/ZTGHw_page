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
                <li><img src="<?= base_url('assets/images/banco.png') ?>" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transferencia</li>
                <li><img src="<?=base_url('assets/images/efectivo.png') ?>" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Efectivo</li>
                <li><img src="<?=base_url('assets/images/tarjeta.png') ?>" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tarjeta crédito o débito</li>
           </ul> 
        </div>
        <div class="forma-envio">
            <h3>Formas de envío</h3>
            <ul class="opcEnvio">
                <li><img src="<?=base_url('assets/images/shipped_411763.png') ?>" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Entrega a domicilio</li>
                <li><img src="<?=base_url('assets/images/pin.png') ?>" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Retiro en local</li>
            </ul> 
        </div>
        <div class="forma-contacto">
            <h3>Contacto</h3>
            <ul class="opcEnvio">
                <li><img src="<?=base_url('assets/images/whatsapp.png') ?>" width="4%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WhatsApp </li>
                <li><img src="<?=base_url('assets/images/facebook.png') ?>" width="4%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facebook</li>
                <li><img src="<?=base_url('assets/images/instagram.png') ?>" width="4%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instagram</li>
                <li><img src="<?=base_url('assets/images/tik-tok.png') ?>" width="4%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tik Tok</li>
            </ul> 
        </div>

</footer>