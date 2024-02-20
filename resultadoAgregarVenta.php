<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\stock.css">
    <title>AGREGAR VENTA - RESULTADO</title>
</head>
<body>
    
</body>
</html>
<?php
    require 'funciones/ventas.php';
    require 'funciones/conexion.php';

    if(isset($_POST['enviar'])){
        $agregarVenta = agregarVenta();
        $facturaCliente = actualizarFacturaCliente();
    }


    if($agregarVenta){
?>

            <div class="marcasSuccess">
                <h1>VENTA AGREGADA CORRECTAMENTE</h1>
                <a href="agregarVenta.php">Volver para agregar una venta</a>
            </div>

<?php
        } else {
?>
            <div class="marcasNotSuccess">
                <h1>NO SE PUDO AGREGAR LA VENTA</h1>
                <a href="agregarVenta.php">Volver para intentarlo nuevamente...</a>
            </div>
<?php
        }
?>