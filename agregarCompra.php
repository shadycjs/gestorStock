<?php
    require 'funciones/conexion.php';
    require 'funciones/proveedores.php';
    require 'funciones/compras.php';
    $proveedor = listarProveedores();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\agregarCompra.css">
    <title>RC Computers - AGREGAR COMPRA</title>
</head>
<body>
    <form method="post" action="agregarCompraProductos.php" enctype="multipart/form-data" class="container__todo">
        <a href="principalCompras.php">VOLVER A COMPRAS</a>
        <h1>¿ CUANTOS PRODUCTOS DESEA CARGAR ?</h1>
        <div class="container__todo__sub">
            <div class="container__todo__sub-inputs">
                <label for="cantidadPrd">Cantidad de productos en la orden:</label>
                <input type="number" name="cantidadPrd" id="">
            </div>
            <input type="submit" value="SIGUIENTE" id="agregar" name="siguiente">
        </div>
    </form>
</body>
</html>
