<?php
    require 'funciones\compras.php';
    require 'funciones/conexion.php';
    $compras = listarCompraProducto();
    if(isset($_POST['ordenar'])){
        $compras = ordenarCompras();
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
    <title>RC Computers - COMPRAS</title>
</head>
<body>

    <div class="container__todo">
        <h1>COMPRAS</h1>

        <div class="container__todo-sub">
            <form action="" method="get" class="container__todo-buscador">
                <button name="enviar"><ion-icon name="search-outline"></ion-icon></button>
                <input type="text" name="buscador" id="buscar_1">
            </form>
            <a href="principalCompras.php">VOLVER</a>
            <a href="principalComprasDetalladas.php">Compras detalladas</a>
            <form action="" method="post" class="container__todo-ordenar">
                <select name="ordenar" id="">
                    <option value="">Ordenar por...</option>
                    <option value="2">Proveedor</option>
                    <option value="3">Fecha</option>
                    <option value="4">Menor Precio</option>
                    <option value="5">Mayor Precio</option>
                </select>
                <input type="submit" value="Refrescar">
            </form>
        </div>
        <table>
        <form action="confirmarEliminarCompra.php" method="post">
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

if(!empty($_GET['buscador'])){ // SI NO ESTA VACIO EL BUSCADOR
    $buscador = buscadorCompras();
    if(isset($_POST['ordenar'])){
        $buscador = ordenarComprasBuscador();
    }
    while( $row = mysqli_fetch_assoc( $buscador ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...
        $css = 'background-color: #fff';
        if($row['PROVEEDOR'] == 'JUKEBOX S.A'){
            $css = 'background-color: #48a0f9';
        } elseif($row['PROVEEDOR'] == 'NEWTON STATION S.R.L.'){
            $css = 'background-color: #82162c';
        } elseif($row['PROVEEDOR'] == 'ELIT S.A'){
            $css = 'background-color: orange';
        } elseif($row['PROVEEDOR'] == 'NB DISTRIBUIDORA MAYORISTA S R L'){
            $css = 'background-color: #1d5193';
        } elseif($row['PROVEEDOR'] == 'MICRO GLOBAL S.R.L.'){
            $css = 'background-color: #53b092';
        } elseif($row['PROVEEDOR'] == 'PC-ARTS ARGENTINA S.A'){
            $css = 'background-color: black; color: #fff';
        } elseif($row['PROVEEDOR'] == 'STYLUS S.A'){
            $css = 'background-color: #aa96f4';
        } elseif($row['PROVEEDOR'] == 'INTERMACO S R L'){
            $css = 'background-color: #e1ba70';
        }
?>  
        
        <tr style="<?= $css ?>" class="container__todo-fila" >
            <td><?= $row['nro_compra'] ?></td>
            <td><?= $row['fecha'] ?></td>
            <td><?= $row['PROVEEDOR'] ?></td>
            <td><b><?= $row['TOTAL'] ?></b></td>
        </tr>

<?php
    
        }
    } else { while( $compra = mysqli_fetch_assoc( $compras ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...
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
            <td><input type="number" name="" value="<?= $compra['nro_compra'] ?>" readonly="true" style="<?= $css ?>"></td>
            <td><input type="number" name="" value="<?= $compra['id_producto_compra'] ?>" readonly="true" style="<?= $css ?>"></td>
            <td><input type="date" name="" value="<?= $compra['fecha'] ?>" readonly="true" style="<?= $css ?>"></td>
            <td><input type="text" name="" value="<?= $compra['nombre'] ?>" readonly="true" style="<?= $css ?>"></td>
            <td><b><input type="number" name="" value="<?= $compra['precio_unit'] ?>" readonly="true" style="<?= $css ?>"></b></td>
            <td><input type="number" name="" value="<?= $compra['cantidad'] ?>" readonly="true" style="<?= $css ?>"></td>
            <td><input type="text" name="" value="<?= $compra['PROVEEDOR'] ?>" readonly="true" style="<?= $css ?>"></td>

            <td><input type="checkbox" name="check[]" id="" value="<?= $compra['id_producto_compra'] ?>"></td>
        </tr>

<?php
    }
}
?>
        
        
        </table>
        <input type="submit" value="ELIMINAR" name="eliminarCompra" id="eliminar">
        </form>
    </div>







</body>
</html>