<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pagCargas.css">
    
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


    <title>ZTG Hardware - Mod Articulo</title>
</head>
<body>
    <div class="seccion-mod">

        <h1>Modificar Articulo</h1>

        <div class="cuadros">
            <div class="art-izq">
                <h2 align="center">Datos actuales</h2>
                <p>Código&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $articulo->id; ?> </p>
                <p>Artículo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $articulo->nombre; ?> </p>
                <p>Descripción: <?= $articulo->descripcion; ?> </p>
                <p>Precio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $articulo->precio; ?> </p>
                <p>Stock&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $articulo->stock; ?> </p>
                <p>Categoria&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $articulo->categoria; ?> </p>
                <?php $id = $articulo->id; ?>
            </div>
            <div class="art-der">
            <h3 align="center">Datos nuevos</h3>
                        <form action="<?= base_url(); ?>AbmArticulos/modificarArticulo/<?= $id ?>" method="POST" enctype="multipart/form-data">
                        <p>Código &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                        <input type="text" name="idNuevo" placeholder="Id" maxlength="40"></p>
                        <p>Nombre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                        <input type="text" name="nombre" placeholder="Nombre del artículo" maxlength="40"></p>
                        <p>Descripcion : 
                        <input type="text" name="descripcion" placeholder="Descripción"  maxlength="100"></p>
                        <p>Precio &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                        <input type="text" name="precio" placeholder="Precio" maxlength="10"></p>
                        <p>Stock&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                        <input type="text" name="stock" placeholder="Stock" maxlength="6"></p>

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

                        <p>Imagen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="file" class="btn btn-dark" name="imagen" accept="image/*">
                        </p>
                            <input type="submit" value="Modificar artículo" class="btn btn-dark" id="boton" >
                        </form>     
            </div>
        </div>

    </div>
       
</body>
</html>