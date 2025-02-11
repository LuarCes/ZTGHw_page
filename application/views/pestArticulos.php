<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pagCargas.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;1,100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <style>@import url('https://fonts.googleapis.com/css2?family=Calistoga&display=swap');</style>

    <title>Marolio - Articulos</title>
</head>
  
<body>

    <div class="body-carga">

        
            

            <div class="titulo">
                <h3 id="mostrar-lista" align="center">Lista de Productos</h3>
            </div>

            
            <div class="seccion-carga">
                <form class="form" action="<?= base_url(); ?>AbmArticulos/crearArticulo" method="POST" id="formArticulos" enctype="multipart/form-data">
                    <h3 id="carga-lista" align="center">Carga de Artículos</h3>

                    
                    <p>Codigo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;
                        <input type="text" name="id" placeholder="Cod del producto" required maxlength="40"
                            align="center">
                    </p>
                    
                    <p>Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;
                        <input type="text" name="nombre" placeholder="Nombre del artículo" required maxlength="40"
                            align="center">
                    </p>
                    <p>Descripcion :&nbsp;&nbsp;
                        <input type="text" name="descripcion" placeholder="Descripción" maxlength="100" align="center">
                    </p>
                    <p>Precio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                        <input type="text" name="precio" placeholder="Precio" required maxlength="10" align="center">
                    </p>
                    <p>Stock&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                        <input type="text" name="stock" placeholder="Stock" required maxlength="10" align="center">
                    </p>


                    <p>Categoria&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                        <select name="categoria" name="categoria"  align="center">
                            <option>Auriculares</option>
                            <option>Mouse</option>
                            <option>Teclado</option>
                            <option>Camara</option>
                            <option>Parlantes</option>
                            <option>Cables</option>
                            <option>Videojuegos</option>
                            <option>Joystick</option>
                            <option>Fundas</option>
                            <option>Otros</option>
                        </select>
                    </p>

                    <p>Destacado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                        <select name="destacado" name="destacado"  align="center">
                            <option>Si</option>

                            <option>No</option>
                        </select>
                    </p>

                    <p>Imagen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                    <input type="file" class="btn btn-dark" name="imagen" accept="image/*">
                    </p>


                    <button type="submit" class="btn btn-dark" align="center">Cargar artículo</button>
                </form>
                <div class="img-carga">
                    <img src="<?= base_url('assets/images/zelda.png') ?>">
                </div>
            </div>
            
      


        <table id="deProductos" width="90%" align="center">
            <tr class="titulos" align="center">
                <th id="id">Código</th>
                <th id="articulos">Artículo</th>
                <th id="descripcion">Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th></th>
                <th></th>
            </tr>
            <?php 
            foreach ($articulos->result() as $articulo){
                $url_img = "assets/images/articulos/" . $articulo->id . ".png"; ?>
            <tr align="center">
                <td>
                    <?= $articulo->id; ?>
                </td>
                <td>
                    <?= $articulo->nombre; ?>
                </td>
                <td>
                    <?= $articulo->descripcion; ?>
                </td>
                <td width=100px>
                    <?= $articulo->precio; ?>
                </td>
                <td width=100px>
                    <?= $articulo->stock; ?>
                </td>
                <td width=200px><img src='<?= base_url() . $url_img ?>' alt='articulo.png' width=150px height=150px>
                </td>

                <!-- Button trigger modal, esto llama al modal que se encuentra mas abajo-->
                <td  width=100px><button type="button" class="btn btn-primary" id="boton" data-bs-toggle="modal" data-bs-target="#eliminarModal" 
                data-articulo-id="<?= $articulo->id ?>" data-articulo-nombre="<?= $articulo->nombre ?>">Eliminar</button>
                </td>

                <td  width=100px><a href="<?=base_url();?>AbmArticulos/confirmarModificacion/<?= $articulo->id; ?>">
                    <button type="button" class="btn btn-secondary" id="boton">Modificar</button></a>
                </td>
            </tr>
                <?php 
                }
                ?>
        </table>

    


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $(document).on('click', '.btn-primary[data-bs-toggle="modal"]', function (event) {
            event.preventDefault(); // Evita que el modal Bootstrap se abra

            console.log("Se hizo clic en el botón eliminar"); // <-- Verificar en la consola del navegador

            var articuloId = $(this).data('articulo-id'); // Obtiene el ID del artículo
            var articuloNombre = $(this).data('articulo-nombre'); // Obtiene el nombre del artículo

            console.log("ID del artículo:", articuloId); // <-- Verificar si el ID es correcto
            console.log("Nombre del artículo:", articuloNombre);

            // Mostrar alerta de confirmación con SweetAlert2
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Vas a eliminar el artículo "' + articuloNombre + '". Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, redirigir a la URL de eliminación
                    console.log("Redirigiendo a:", '<?= base_url(); ?>AbmArticulos/eliminarArticulo/' + articuloId);
                    window.location.href = '<?= base_url(); ?>AbmArticulos/eliminarArticulo/' + articuloId;
                }
            });
        });
    });
</script>




</body>

</html>