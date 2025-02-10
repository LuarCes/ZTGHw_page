<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZTG Hardware - Administradores</title>
</head>
<body>
    
    <h1>Eres Admin?</h1>

    <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">

            <div class="form">
              <div class="tab-content">
                 

                <h1>Ingresa tus datos</h1>

                <form action="<?= base_url(); ?>inicioAdmin/ValidarUsuarioAdmin" method="POST">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="form-outline mb-4">
                    <input type="text" name="name" id="form3Example3" class="form-control" />
                    <label class="form-label" for="form3Example3">Administrador</label>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="pass" id="form3Example4" class="form-control" />
                    <label class="form-label" for="form3Example4">Contraseña</label>
                  </div>
                  
                  <h4> <?php echo($msj); ?> </h4>
                  <!-- Submit button -->
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
  </div>
 
</section>

</body>
</html>