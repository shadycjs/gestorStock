<?php

    require 'funciones/compras.php';
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
    <title>RC Computers - Confirmacion eliminar compra</title>
</head>
<body>

    <div class="container__todo">
    <a href="eliminarCompras.php">VOLVER</a>
        <h1>DESEA ELIMINAR ESTAS COMPRAS?</h1> 
        <div class="container__todo-sub">
        </div>
        <form action="resultadoEliminarCompra.php" method="post">
        <table>

        <tr class="container__todo-fila" id="fila__uno">
                <td>Nro Compra</td>
                <td>Id del producto</td>
                <td>Fecha</td>
                <td>Nombre del producto</td>
                <td>Precio unitario</td>
                <td>Cantidad</td>
                <td>Proveedor</td>
            </tr>

<?php
    if(!empty($_POST['check'])){
        $ids = $_POST['check'];

        foreach( $ids as $id ){
            $compras = verCompraPorId($id);
            $compra = mysqli_fetch_assoc($compras);

            $css = 'background-color: #fff';
            if($compra['PROVEEDOR'] == 'JUKEBOX S.A'){
                $css = 'background-color: #48a0f9';
            } elseif($compra['PROVEEDOR'] == 'NEWTON STATION S.R.L.'){
                $css = 'background-color: #82162c';
            } elseif($compra['PROVEEDOR'] == 'ELIT S.A'){
                $css = 'background-color: orange';
            } elseif($compra['PROVEEDOR'] == 'NB DISTRIBUIDORA MAYORISTA S R L'){
                $css = 'background-color: #1d5193';
            } elseif($compra['PROVEEDOR'] == 'MICRO GLOBAL S.R.L.'){
                $css = 'background-color: #53b092';
            } elseif($compra['PROVEEDOR'] == 'PC-ARTS ARGENTINA S.A'){
                $css = 'background-color: black; color: #fff';
            } elseif($compra['PROVEEDOR'] == 'STYLUS S.A'){
                $css = 'background-color: #aa96f4';
            } elseif($compra['PROVEEDOR'] == 'INTERMACO S R L'){
                $css = 'background-color: #e1ba70';
            }
?>

        <tr class="container__todo-fila" >
            <td><input type="number" value="<?= $compra['nro_compra'] ?>" readonly="true" style="<?= $css ?>"></td>
            <td><input type="number" name="id[]" value="<?= $compra['id_producto_compra'] ?>" readonly="true" style="<?= $css ?>"></td>
            <td><input type="date" value="<?= $compra['fecha'] ?>" readonly="true" style="<?= $css ?>"></td>
            <td><input type="text" value="<?= $compra['nombre'] ?>" readonly="true" style="<?= $css ?>"></td>
            <td><b><input type="number" value="<?= $compra['precio_unit'] ?>" readonly="true" style="<?= $css ?>"></b></td>
            <td><input type="number" value="<?= $compra['cantidad'] ?>" readonly="true" style="<?= $css ?>"></td>
            <td><input type="text" value="<?= $compra['PROVEEDOR'] ?>" readonly="true" style="<?= $css ?>"></td>
        </tr>

<?php
    }
}
?>
        </table>
        <input type="submit" value="CONFIRMAR ELIMINACION" name="confirmElim">
        </form>