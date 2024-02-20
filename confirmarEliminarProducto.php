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
    <title>RC Computers - STOCK</title>
</head>
<?php

    require 'funciones/productos.php';

    if(empty($_POST['check'])){
?>
        <div class="marcasNotSuccess">
            <h1>NO SE SELECCIONO NINGUN PRODUCTO</h1>
            <a href="eliminarProducto.php">Volver al panel de eliminacion</a>
        </div>

<?php
    } else {
?>

<body>

    <div class="container__todo">
        
        <a href="eliminarProducto.php">VOLVER</a>
        <h1>¿DESEA ELIMINAR ESTOS PRODUCTOS? </h1>
        <form action="resultadoEliminarProducto.php" method="post" class="formEliminarMarca">
        <table>

            <tr class="container__todo-fila" id="fila__uno">
                <td>Categoria</td>
                <td>Marca</td>
                <td>Producto</td>
                <td>Precio</td>
                <td>Descripcion</td>
                <td>Stock</td>
            </tr>

<?php
    
        $ids = $_POST['check'];


        foreach( $ids as $id ){
            $productos = verProductoPorID($id);
            $producto = mysqli_fetch_assoc($productos);
        
            $css = 'background-color: #fff';
            if($producto['Categoria'] == 'Microprocesador'){
                $css = 'background-color: orange';
            } elseif($producto['Categoria'] == 'Motherboard'){
                $css = 'background-color: #1f8bfa';
            } elseif($producto['Categoria'] == 'Memoria RAM'){
                $css = 'background-color: #0ba736';
            } elseif($producto['Categoria'] == 'Disco Duro'){
                $css = 'background-color: black; color: #fff';
            } elseif($producto['Categoria'] == 'Disco Sólido'){
                $css = 'background-color: cyan';
            } elseif($producto['Categoria'] == 'Placa de video'){
                $css = 'background-color: pink';
            } elseif($producto['Categoria'] == 'Gabinete'){
                $css = 'background-color: grey';
            } elseif($producto['Categoria'] == 'Cooler'){
                $css = 'background-color: violet';
            }
?>

<tr class="container__todo-fila" >
            <td><input style="<?= $css ?>" type="text" name="" id="" value="<?= $producto['Categoria'] ?>" readonly="true"></td>
            <td><input type="text" name="" id="" value="<?= $producto['Marca'] ?>" readonly="true"></td>
            <td><input type="text" name="" id="" value="<?= $producto['Producto'] ?>" readonly="true"></td>
            <td><b><input type="number" name="" id="" value="<?= $producto['Precio'] ?>" readonly="true"></b></td>
            <td><input type="text" name="" id="" value="<?= $producto['Descripcion'] ?>" readonly="true"></td>
            <input type="hidden" name="id[]" value="<?= $producto['id_producto'] ?>">
<?php
    $cssStock = 'background-color : green';
    if($producto['stock'] == 1){
        $cssStock = 'background-color : yellow';
    } elseif($producto['stock'] == 0){
        $cssStock = 'background-color : red';
    }
?>
            <td><b><input style="<?= $cssStock ?>" type="number" name="" id="" value="<?= $producto['stock'] ?>" readonly="true"></b></td>
        </tr>

<?php
    }
?>
        </table>
            <input type="submit" value="CONFIRMAR ELIMINACION" name="confirmElim" id="eliminar">
        </form>
<?php
}
?>

