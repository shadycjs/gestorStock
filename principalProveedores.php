<?php
    require 'funciones\productos.php';
    require 'funciones/proveedores.php';
    $proveedores = listarProveedores();
    if(isset($_POST['ordenar'])){
        $productos = ordenarProductos();
    }
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
    <title>RC Computers - PROVEEDORES</title>
</head>
<body>

    <div class="container__todo">
        <h1>LISTADO DE PROVEEDORES</h1>
        <a href="principal.php">INICIO</a>
        <div class="container__todo-sub">
            <div class="container-todo-botones">
                <a href="agregarMarca.php" id="agregar">AGREGAR PROVEEDOR</a>
                <a href="eliminarMarca.php" id="eliminar">ELIMINAR PROVEEDOR</a>
            </div>
        </div>
        <table>

            <tr class="container__todo-fila" id="fila__uno">
                <td>ID</td>
                <td>Razon social</td>
                <td>Direccion</td>
                <td>Telefono</td>
            </tr>
<?php 

while( $proveedor = mysqli_fetch_assoc( $proveedores ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...       
    $css = 'background-color: #fff';
    if($proveedor['razon_social'] == 'JUKEBOX S.A'){
        $css = 'background-color: #48a0f9';
    } elseif($proveedor['razon_social'] == 'NEWTON STATION S.R.L.'){
        $css = 'background-color: #82162c';
    } elseif($proveedor['razon_social'] == 'ELIT S.A'){
        $css = 'background-color: orange';
    } elseif($proveedor['razon_social'] == 'NB DISTRIBUIDORA MAYORISTA S R L'){
        $css = 'background-color: #1d5193';
    } elseif($proveedor['razon_social'] == 'MICRO GLOBAL S.R.L.'){
        $css = 'background-color: #53b092';
    } elseif($proveedor['razon_social'] == 'PC-ARTS ARGENTINA S.A'){
        $css = 'background-color: black; color: #fff';
    } elseif($proveedor['razon_social'] == 'STYLUS S.A'){
        $css = 'background-color: #aa96f4';
    } elseif($proveedor['razon_social'] == 'INTERMACO S R L'){
        $css = 'background-color: #e1ba70';
    } 
?>  
        <tr class="container__todo-fila" >
            <td><?= $proveedor['id_proveedor'] ?></td>
            <td style="<?= $css ?>"><?= $proveedor['razon_social'] ?></td>
            <td><?= $proveedor['direccion'] ?></td>
            <td><?= $proveedor['telefono_asist'] ?></td>
        </tr>
<?php
    }

?>
        </table>
    </div>







</body>
</html>
