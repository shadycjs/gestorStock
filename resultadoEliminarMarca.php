<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\stock.css">
    <title>ELIMINACION DE MARCAS</title>
</head>
<body>
    
</body>
</html>
<?php
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';

    if(isset($_POST['confirmElim'])){
        foreach( $_POST['id'] as $idElim ){
            $marcasElim = eliminarMarcas( $idElim );
        }
        if( $marcasElim ){
?>

            <div class="marcasSuccess">
                <h1>MARCAS ELIMINADAS CORRECTAMENTE</h1>
                <a href="eliminarMarca.php">Volver al panel de eliminacion</a>
            </div>

<?php
        } else {
?>
            <div class="marcasNotSuccess">
                <h1>NO SE PUDIERON ELIMINAR LAS MARCAS</h1>
                <a href="eliminarMarca.php">Volver al panel de eliminacion</a>
            </div>
<?php
        }
    }
?>