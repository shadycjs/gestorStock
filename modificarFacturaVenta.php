<?php
    require 'funciones/conexion.php';
    require 'funciones/ventas.php';

    if( isset($_POST['agregar']) ){
        $agregarFactura = modificarFactura();
        header('location: principalVentas.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\stock.css">
    <title>MODIFICAR FACTURA</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data" class="container__todo">
    <a href="principalVentas.php">VOLVER</a>
    <h1>MODIFICA TU FACTURA PARA EL CLIENTE: <b style="<?= $css ?>; display: flex; text-align: center; "><?= $_GET['cliente'] ?></b> </h1>
    <div class="container__inputs">
            <label for="nombre">FACTURA:</label>
            <input type="file" name="factura" id="">
    </div>
    <input type="submit" value="MODIFICAR FACTURA" id="agregar" name="agregar">
</form>
    
</body>
</html>
