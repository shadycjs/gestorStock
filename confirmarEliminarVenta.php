<?php

    require 'funciones/ventas.php';
    require 'funciones/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css\stock.css">
    <link rel="icon" href="LOGO RC STOCK.ico">
    <title>RC Computers - Confirmacion eliminar venta</title>
</head>
<body>

    <div class="container__todo">
    <a href="eliminarVenta.php">VOLVER</a>
        <h1>DESEA ELIMINAR ESTAS VENTAS?</h1> 
        <div class="container__todo-sub">
        </div>
        <form action="resultadoEliminarVenta.php" method="post">
        <table>

        <tr class="container__todo-fila" id="fila__uno">
                <td>ID Venta</td>
                <td>Nombre producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Medio de venta</td>
                <td>Forma de pago</td>
                <td>Fecha de venta</td>
                <td>Factura</td>
                <td>Cliente</td>
            </tr>

<?php
    if(!empty($_POST['check'])){
        $ids = $_POST['check'];

        foreach( $ids as $id ){
            $ventas = verVentaPorId($id);
            $venta = mysqli_fetch_assoc($ventas);
?>

<tr class="container__todo-fila" >
            <td><input readonly="true" type="number" name="id[]" value="<?= $venta['id_venta'] ?>"></td>
            <td><input readonly="true" type="text" name="" value="<?= $venta['nombre_producto'] ?>"></td>
            <td><input readonly="true" type="number" name="" value="<?= $venta['precio'] ?>"></td>
            <td><input readonly="true" type="number" name="" value="<?= $venta['cantidad'] ?>"></td>
            <td><input readonly="true" type="text" name="" value="<?= $venta['medio_venta'] ?>"></td>
            <td><input readonly="true" type="text" name="" value="<?= $venta['forma_pago'] ?>"></td>
            <td><input readonly="true" type="date" name="" value="<?= $venta['fecha'] ?>"></td>
            <td><input readonly="true" type="text" name="" value="<?= $venta['factura'] ?>"></td>
            <td><input readonly="true" type="text" name="" value="<?= $venta['nombre_razon'] ?>"></td>
        </tr>

<?php
    }
}
?>
        </table>
        <input type="submit" value="CONFIRMAR ELIMINACION" name="confirmElim" id="eliminarAbajo">
        </form>