<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\stock.css">
    <title>ELIMINACION DE PRODUCTOS</title>
</head>
<body>
    
</body>
</html>
<?php
    require 'funciones/productos.php';

    if(isset($_POST['confirmElim'])){
        foreach( $_POST['id'] as $idElim ){
            $productosElim = eliminarProductos( $idElim );
        }
        if( $productosElim ){
?>

            <div class="marcasSuccess">
                <h1>PRODUCTOS ELIMINADOS CORRECTAMENTE</h1>
                <a href="eliminarProducto.php">Volver al panel de eliminacion</a>
            </div>

<?php
        } else {
?>
            <div class="marcasNotSuccess">
                <h1>NO SE PUDIERON ELIMINAR LOS PRODUCTOS</h1>
                <a href="eliminarProducto.php">Volver al panel de eliminacion</a>
            </div>
<?php
        }
    }
?>