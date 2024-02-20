<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\stock.css">
    <title>ELIMINACION DE COMPRAS</title>
</head>
<body>
    
</body>
</html>
<?php
    require 'funciones/compras.php';
    require 'funciones/conexion.php';

    if(isset($_POST['confirmElim'])){
        foreach( $_POST['id'] as $idElim ){
            $comprasElim = eliminarCompras( $idElim );
            $productosComprasElim = eliminarProductosCompras( $idElim );
        }
        if( $comprasElim ){
?>

            <div class="marcasSuccess">
                <h1>COMPRAS ELIMINADAS CORRECTAMENTE</h1>
                <a href="eliminarCompras.php">Volver al panel de eliminacion</a>
            </div>

<?php
        } else {
?>
            <div class="marcasNotSuccess">
                <h1>NO SE PUDIERON ELIMINAR LAS COMPRAS</h1>
                <a href="eliminarCompras.php">Volver al panel de eliminacion</a>
            </div>
<?php
        }
    }
?>