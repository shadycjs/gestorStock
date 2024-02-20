<?php
    require 'funciones/productos.php';
    require 'funciones/marcas.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\agregarProducto.css">
    <title>RC Computers - Agregar Producto</title>
</head>
<body>
    <a href="principalMarca.php">VOLVER</a>
    <form action="" method="post" class="container__todo">
        <h1>AGREGUE UNA MARCA NUEVA</h1>
        <table>

        <tr class="container__todo-fila" id="fila__uno">
                <td>Nombre de la marca:</td>
            </tr>
        <tr class="container__todo-fila">
            <td><input type="text" name="nombreMk" id=""></td>
            <td><input type="submit" value="AGREGAR MARCA" id="agregar" name="enviar"></td>
        </tr>

        
        </table>
</form>

</body>
</html>

<?php

    if(isset($_POST['enviar'])){
        $insertar = agregarMarcas();
    }

?>