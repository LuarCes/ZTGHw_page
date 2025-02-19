<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/header.css">
    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


            <script>
                $(document).ready(function () {
                 $(document).on('click', '.btn-salir[data-bs-toggle="modal"]', function (event) {
                 event.preventDefault(); 

                    Swal.fire({
                        title: '¿Quieres cerrar sesión?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, salir',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            console.log("Redirigiendo a:", '<?= base_url(); ?>');
                            window.location.href = '<?= base_url(); ?>';
                        }
                    });
                });
            });
            </script>

<script>
        $(document).ready(function () {
                $(".buscador input").on("keypress", function (e) {
                    if (e.which === 13) { 
                        var busqueda = $(this).val().trim(); 

                        if (busqueda !== "") {
                            window.location.href = "<?= base_url(); ?>index.php/buscarProducto/" + encodeURIComponent(busqueda);
                        }
                    }
                });
        });
    </script>


</head>

     <header>
        <a href="<?= base_url(); ?>index.php/bienvenida"><img src="<?= base_url('assets/images/logo.png') ?>" width="80%"></a>
            <div class="buscador">
                <input type="search" class="form-control" name="s" id="" placeholder="Buscar producto..." required="">
            </div> 
            
            <div class="opciones-header">
                <ul class="header-list">
                    <li><a href="<?= base_url(); ?>index.php/bienvenida">Inicio</a></li>
                    <li><a href="<?= base_url(); ?>index.php/nuestrosProductos" >Productos</a></li>
                    <li><a href="<?= base_url(); ?>index.php/cargarArticulos" >Administración</a></li>
                    
                    
                    <li class="btn-salir" id="boton" data-bs-toggle="modal">
                        <i class="fas fa-sign-out-alt" style="font-size: 30px;"></i>
                    </li>
                
                
                
                
                </ul>
            </div> 


            

    </header>
</html>