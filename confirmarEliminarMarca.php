<?php
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\stock.css">
    <title>RC Computers - CONFIRMACION ELIMINAR MARCA</title>
</head>
<body>
    <a href="eliminarMarca.php">Volver</a>
    <form action="resultadoEliminarMarca.php" method="post" class="formEliminarMarca">
    <table>
        <tr class="container__todo-fila" id="fila__uno">
            <td>ID</td>
            <td>Marca</td>
        </tr>
<?php

    if(!empty($_POST['check'])){
        $ids = $_POST['check'];
        
        foreach( $ids as $id ){
            $marcas = verMarcaPorId($id);
            $marca = mysqli_fetch_assoc($marcas);
?>
        <tr class="container__todo-fila">
            <td><input type="number" name="id[]" id="" value="<?= $marca['id_marca'] ?>" readonly="true"></td>
            <td><input type="text" name="nombre[]" id="" value="<?= $marca['nombre_marca'] ?>" readonly="true"></td>
        </tr>
<?php
        }
    }
?>


    </table>
        <input type="submit" value="CONFIRMAR ELIMINACION" name="confirmElim">
    </form>

</body>
</html>