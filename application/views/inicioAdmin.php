<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/admin.css">

    <title>ZTGHardware - Administradores</title>
</head>
<body>
    

<div class="contenido-admin">
    <h1>🎮¿ Eres Admin ?🎮</h1>

    <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">

            <div class="form">
              <div class="tab-content">
                 

                <h2>Ingresa tus datos</h2>

                <form action="<?= base_url(); ?>inicioAdmin/ValidarUsuarioAdmin" method="POST">
                  <div class="datos-form">
                  <label class="form-label" for="form3Example3">Administrador : </label>
                    <input type="text" name="name" id="admin-user" class="form-control" />
                  
                  <label class="form-label" for="form3Example4">Contraseña  &nbsp;&nbsp;&nbsp;&nbsp;: </label>
                    <input type="password" name="pass" id="admin-pass" class="form-control" />
                    
                  </div>
                  
                  <h4> <?php echo($msj); ?> </h4>
                  <button type="submit" class="btn btn-primary btn-block mb-4" id="boton">
                    Iniciar Sesión 
                  </button>
                </form>

                <h4 style="color: red;"> 
                     <?php if (isset($msj)) echo htmlspecialchars($msj); ?> 
                </h4>

                
              

              </div> 
            </div>

            </div>
          </div>
    </div>
  </div>
</section>

</body>
</html>