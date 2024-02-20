<?php

    require 'funciones/clientes.php';
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
    <title>RC Computers - Confirmacion eliminar cliente</title>
</head>
<body>

    <div class="container__todo">
    <a href="eliminarCliente.php">VOLVER</a>
        <h1>DESEA ELIMINAR ESTOS CLIENTES?</h1> 
        <div class="container__todo-sub">
        </div>
        <form action="resultadoEliminarCliente.php" method="post">
        <table>

        <tr class="container__todo-fila" id="fila__uno">
                <td>ID Cliente</td>
                <td>Nombre/Razon</td>
                <td>CUIT/DNI</td>
                <td>Telefono</td>
                <td>Mail</td>
                <td>Provincia</td>
                <td>Ciudad</td>
                <td>Calle</td>
                <td>Codigo postal</td>
                <td>Factura</td>
            </tr>

<?php
    if(!empty($_POST['check'])){
        $ids = $_POST['check'];

        foreach( $ids as $id ){
            $clientes = verClientePorId($id);
            $cliente = mysqli_fetch_assoc($clientes);

?>

        <tr class="container__todo-fila" >
            <td><input readonly="true" type="number" name="id[]" value="<?= $cliente['id_cliente'] ?>"></td>
            <td><input readonly="true" type="text" value="<?= $cliente['nombre_razon'] ?>"></td>
            <td><input readonly="true" type="text" value="<?= $cliente['cuit_dni'] ?>"></td>
            <td><input readonly="true" type="number" value="<?= $cliente['telefono'] ?>"></td>
            <td><input readonly="true" type="email" value="<?= $cliente['email'] ?>"></td>
            <td><input readonly="true" type="text" value="<?= $cliente['provincia'] ?>"></td>
            <td><input readonly="true" value="<?= $cliente['ciudad'] ?>"></td>
            <td><input readonly="true" type="text" value="<?= $cliente['calle'] ?>"></td>
            <td><input readonly="true" type="number" value="<?= $cliente['codigo_postal'] ?>"></td>
            <td><input readonly="true" type="text" value="<?= $cliente['factura'] ?>"></td>
        </tr>

<?php
    }
}
?>
        </table>
        <input type="submit" value="CONFIRMAR ELIMINACION" name="confirmElim" id="eliminarAbajo">
        </form>