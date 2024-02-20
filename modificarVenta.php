<?php
    require 'funciones\ventas.php';
    require 'funciones/clientes.php';
    require 'funciones/conexion.php';
    $ventas = listarVentas();
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
    <title>RC Computers - VENTAS</title>
</head>
<body>

    <div class="container__todo">
        <h1>MODIFICAR VENTAS</h1>

        <div class="container__todo-sub">

            <form action="" method="get" class="container__todo-buscador">
                <button name="enviar"><ion-icon name="search-outline"></ion-icon></button>
                <input type="text" name="buscador" id="buscar_1">
            </form>
            <a href="principalVentas.php">VOLVER</a>
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
        <form action="" method="post" enctype="multipart/form-data">
        <tr class="container__todo-fila" id="fila__uno">
                <td>ID Venta</td>
                <td>Nombre producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Medio de venta</td>
                <td>Forma de pago</td>
                <td>Fecha de venta</td>
                <td>Cliente</td>
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
    } else { while( $venta = mysqli_fetch_assoc( $ventas ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...
?>  
        
        <tr class="container__todo-fila" >
            <td><input type="number" name="id[<?= $venta['id_venta'] ?>]" value="<?= $venta['id_venta'] ?>"></td>
            <td><input type="text" name="nombrePrd[<?= $venta['id_venta'] ?>]" value="<?= $venta['nombre_producto'] ?>"></td>
            <td><input type="number" name="precio[<?= $venta['id_venta'] ?>]" value="<?= $venta['precio'] ?>"></td>
            <td><input type="number" name="cant[<?= $venta['id_venta'] ?>]" value="<?= $venta['cantidad'] ?>"></td>
            <td><input type="text" name="medio[<?= $venta['id_venta'] ?>]" value="<?= $venta['medio_venta'] ?>"></td>
            <td><input type="text" name="forma[<?= $venta['id_venta'] ?>]" value="<?= $venta['forma_pago'] ?>"></td>
            <td><input type="date" name="fecha[<?= $venta['id_venta'] ?>]" value="<?= $venta['fecha'] ?>"></td>
            <td><input type="text" name="nombreCli[<?= $venta['id_cliente'] ?>]" value="<?= $venta['nombre_razon'] ?>"></td>
            <input type="hidden" name="idcli[<?= $venta['id_cliente'] ?>]" value="<?= $venta['id_cliente'] ?>">
        </tr>

<?php

    }
    
}
?>
        
        
        </table>
        <input type="submit" value="Guardar Cambios" name="guardar" id="agregarAbajo">
        </form>
    </div>

<?php

    
    


    if(isset($_POST['guardar'])){
        $totalID = count($_POST['id']);
        $totalID2 = count($_POST['idcli']);

        foreach( $_POST['id'] as $ids )
        {
            $modificarVenta = modificarVenta($ids);
        }

        foreach( $_POST['idcli'] as $id )
        {
            $modificarClienteNombre = modificarNombreCliente($id);
        }

    }
?>





</body>
</html>