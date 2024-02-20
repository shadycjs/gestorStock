<?php
    require 'funciones\productos.php';
    require 'funciones/marcas.php';
    $marcas = listarMarcas();
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
    <title>RC Computers - ELIMINAR MARCAS</title>
</head>
<body>

    <div class="container__todo">
        <h1>LISTADO DE MARCAS</h1>
        <a href="principalMarca.php">INICIO</a>
        <form action="confirmarEliminarMarca.php" method="post" class="formEliminarMarca">
        <table>

            <tr class="container__todo-fila" id="fila__uno">
                <td>ID</td>
                <td>Marca</td>
            </tr>
<?php 

while( $marca = mysqli_fetch_assoc( $marcas ) ){ 
?>  
        <tr class="container__todo-fila">
            <td><input type="number" name="" id="" value="<?= $marca['id_marca'] ?>" readonly="true"></td>
            <td><input type="text" name="" id="" value="<?= $marca['nombre_marca'] ?>" readonly="true"></td>

            <td><input type="checkbox" name="check[]" value="<?= $marca['id_marca'] ?>" id=""></td>
        </tr>
<?php
    }

?>
        </table>
            <input type="submit" value="ELIMINAR">
        </form>
    </div>







</body>
</html>