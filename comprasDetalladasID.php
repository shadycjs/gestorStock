<?php
    require 'funciones\compras.php';
    require 'funciones/conexion.php';
    $compras = verOrdenCompraPorId( $_GET['nro'] );
    if(isset($_POST['ordenar'])){
        $compras = ordenarComprasDetalladas();
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
    <title>RC Computers - COMPRAS DETALLADAS POR ID</title>
</head>
<body>

    <div class="container__todo">
        <h1>ORDEN DE COMPRA</h1>
        
        <div class="container__todo-sub">
            <form action="" method="get" class="container__todo-buscador">
                <button name="enviar"><ion-icon name="search-outline"></ion-icon></button>
                <input type="text" name="buscador" id="buscar_1">
            </form>
            <a href="principalCompras.php">VOLVER</a>
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

            <tr class="container__todo-fila" id="fila__uno">
                <td>Nro Compra</td>
                <td>Id producto</td>
                <td>Fecha</td>
                <td>Producto</td>
                <td>Precio Unitario</td>
                <td>Cantidad</td>
                <td>Proveedor</td>
            </tr>
<?php 

if(!empty($_GET['buscador'])){ // SI NO ESTA VACIO EL BUSCADOR
    $buscador = buscadorComprasDetalladas();
    if(isset($_POST['ordenar'])){
        $buscador = ordenarComprasDetalladasBuscador();
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
            <td><?= $row['PRODUCTO'] ?></td>
            <td><b><?= $row['precio_unit'] ?></b></td>
            <td><b><?= $row['cantidad'] ?></b></td>
            <td><?= $row['PROVEEDOR'] ?></td>
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
        
        <tr style="<?= $css ?>" class="container__todo-fila" >
            <td><?= $compra['nro_compra'] ?></td>
            <td><?= $compra['id_producto_compra'] ?></td>
            <td><?= $compra['fecha'] ?></td>
            <td><?= $compra['nombre'] ?></td>
            <td><b><?= $compra['precio_unit'] ?></b></td>
            <td><b><?= $compra['cantidad'] ?></b></td>
            <td><?= $compra['PROVEEDOR'] ?></td>
        </tr>

<?php
    }
}
?>
        </table>
    </div>







</body>
</html>