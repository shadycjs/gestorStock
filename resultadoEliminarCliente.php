<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\stock.css">
    <title>ELIMINACION DE CLIENTES</title>
</head>
<body>
    
</body>
</html>
<?php
    require 'funciones/clientes.php';
    require 'funciones/conexion.php';
    require 'funciones/ventas.php';

    if(isset($_POST['confirmElim'])){
        foreach( $_POST['id'] as $idElim ){
            $ventasElim = eliminarVenta( $idElim );
            $clientesElim = eliminarCliente( $idElim );     
        }
        if( $clientesElim ){
?>

            <div class="marcasSuccess">
                <h1>CLIENTES ELIMINADOS CORRECTAMENTE</h1>
                <a href="eliminarCliente.php">Volver al panel de eliminacion</a>
            </div>

<?php
        } else {
?>
            <div class="marcasNotSuccess">
                <h1>NO SE PUDIERON ELIMINAR LOS CLIENTES</h1>
                <a href="eliminarCliente.php">Volver al panel de eliminacion</a>
            </div>
<?php
        }
    }
?>