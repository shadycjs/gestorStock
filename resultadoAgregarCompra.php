<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\stock.css">
    <title>AGREGAR COMPRAS - RESULTADO</title>
</head>
<body>
    
</body>
</html>
<?php
    session_start();
    require 'funciones/compras.php';
    require 'funciones/conexion.php';

    if(isset($_POST['agregarOrden'])){
        $cantidad = count($_SESSION['idPrd']);
        for( $i=0; $i<$cantidad; $i++){
            $insertarOrden = agregarCompra( $i );
        }
    }


    if($insertarOrden){
?>

            <div class="marcasSuccess">
                <h1>COMPRAS AGREGADAS CORRECTAMENTE</h1>
                <a href="agregarCompra.php">Volver para agregar una marca</a>
            </div>

<?php
        } else {
?>
            <div class="marcasNotSuccess">
                <h1>NO SE PUDIERON AGREGAR LAS COMPRAS</h1>
                <a href="agregarCompra.php">Volver para intentarlo nuevamente...</a>
            </div>
<?php
        }
?>