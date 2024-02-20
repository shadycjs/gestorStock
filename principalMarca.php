<?php
    require 'funciones\productos.php';
    require 'funciones/marcas.php';
    $marcas = listarMarcas();
    if(isset($_POST['ordenar'])){
        $productos = ordenarProductos();
    }
    $stock = verPrecioStock();
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
    <title>RC Computers - MARCAS</title>
</head>
<body>

    <div class="container__todo">
        <h1>LISTADO DE MARCAS</h1>
        <a href="principal.php">INICIO</a>
        <div class="container__todo-sub">
            <div class="container-todo-botones">
                <a href="agregarMarca.php" id="agregar">AGREGAR MARCA</a>
                <a href="eliminarMarca.php" id="eliminar">ELIMINAR MARCA</a>
            </div>
        </div>
        <table>

            <tr class="container__todo-fila" id="fila__uno">
                <td>ID</td>
                <td>Marca</td>
            </tr>
<?php 

while( $marca = mysqli_fetch_assoc( $marcas ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...        
?>  
        <tr class="container__todo-fila" >
            <td style="<?= $css ?>"><?= $marca['id_marca'] ?></td>
            <td><?= $marca['nombre_marca'] ?></td>
        </tr>
<?php
    }

?>
        </table>
    </div>







</body>
</html>
