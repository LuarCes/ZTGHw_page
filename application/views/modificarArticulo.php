<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pagCargas.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/inicio.css">

    <title>ZTG Hardware - Mod Articulo</title>
</head>
<body>
    <div class="bodyModArt" id="mArticulos">

        <h1 class="titulo" align="center">Modificar Artículo</h1>
      

        <div class="cuadros-mod">

            <div class="cuadro-izq">

                <h3 align="center">Datos actuales</h3>
                <p>Artículo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $articulo->nombre; ?> </p>
                <p>Descripción: <?= $articulo->descripcion; ?> </p>
                <p>Precio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $articulo->precio; ?> </p>
                <p>Stock&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $articulo->stock; ?> </p>
                <?php $id = $articulo->id; ?>

            </div>


            <div class="cuadro-der" align="center">
                <div class="form">
                    <h3 align="center">Datos nuevos</h3>
                        <form action="<?= base_url(); ?>AbmArticulos/modificarArticulo/<?= $id ?>" method="POST" enctype="multipart/form-data">
                        <p>Nombre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                        <input type="text" name="nombre" placeholder="Nombre del artículo" required maxlength="40"></p>
                        <p>Descripcion : 
                        <input type="text" name="descripcion" placeholder="Descripción"  maxlength="100"></p>
                        <p>Precio &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                        <input type="text" name="precio" placeholder="Precio" required maxlength="10"></p>
                        <p>Stock&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                        <input type="text" name="stock" placeholder="Stock" required maxlength="6"></p>
                        <p>Imagen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="file" class="btn btn-dark" name="imagen" accept="image/*">
                        </p>
                        <input type="submit" value="Modificar artículo" class="btn btn-dark" id="boton" >
                        </form>     
                </div>

                <div class="fotoMod">
                    <img class="imagen" src="<?= base_url(); ?>assets\imagenes\alacena.png">
                </div> 
            </div>

        </div>
            


    </div>


                    
    </div>
</body>
</html>