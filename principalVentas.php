<?php
    require 'funciones\ventas.php';
    require 'funciones/conexion.php';
    $ventas = listarVentas();
    if(isset($_POST['ordenar'])){
        $clientes = ordenarClientes();
    }

    if(isset($_GET['id'])){
        $bajar = bajarArchivo();
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
        <h1>VENTAS</h1>
        <a href="principal.php">VOLVER</a>
        <a href="principalClientes.php">Clientes</a>
        <div class="container__todo-sub">
            <form action="" method="get" class="container__todo-buscador">
                <button name="enviar"><ion-icon name="search-outline"></ion-icon></button>
                <input type="text" name="buscador" id="buscar_1">
            </form>
            <div class="container-todo-botones">
                <a href="agregarVenta.php" id="agregar">AGREGAR VENTA</a>
                <a href="eliminarVenta.php" id="eliminar">ELIMINAR VENTA</a>
                <a href="modificarVenta.php" id="modificar">MODIFICAR VENTA</a>
            </div>
            <form action="" method="post" class="container__todo-ordenar">
                <select name="ordenar" id="">
                    <option value="">Ordenar por...</option>
                    <option value="2">Forma de pago</option>
                    <option value="3">Precio</option>
                    <option value="4">Medio de venta</option>
                </select>
                <input type="submit" value="Refrescar">
            </form>
        </div>
        <table>

            <tr class="container__todo-fila" id="fila__uno">
                <td>ID Venta</td>
                <td>Nombre producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Medio de venta</td>
                <td>Forma de pago</td>
                <td>Fecha de venta</td>
                <td>Factura</td>
                <td>Cliente</td>
            </tr>
<?php 

if(!empty($_GET['buscador'])){ // SI NO ESTA VACIO EL BUSCADOR
    $buscador = buscadorClientes();
    if(isset($_POST['ordenar'])){
        $buscador = ordenarClientesBuscador();
    }
    while( $row = mysqli_fetch_assoc( $buscador ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...

?>  
        
        <tr class="container__todo-fila" >
            <td><?= $row['id_cliente'] ?></td>
            <td><?= $row['nombre_razon'] ?></td>
            <td><?= $row['cuit_dni'] ?></td>
            <td><?= $row['telefono'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['provincia'] ?></td>
            <td><?= $row['ciudad'] ?></td>
            <td><?= $row['calle'] ?></td>
            <td><?= $row['codigo_postal'] ?></td>
            <td><?= $row['factura'] ?></td>
        </tr>

<?php
    
        }
    } else { while( $venta = mysqli_fetch_assoc( $ventas ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...
        $principalVentas = 'principalVentas';

        if($venta['factura'] == 'SIN EMITIR'){
            $principalVentas = 'subirFacturaVenta';
        }
?>  
        
        <tr class="container__todo-fila" >
            <td><?= $venta['id_venta'] ?></td>
            <td><?= $venta['nombre_producto'] ?></td>
            <td style="color: green;
                       min-width: 90px;
                       text-align: center;">$<?= number_format($venta['precio'], 0, ',', ) ?></td>
            <td><?= $venta['cantidad'] ?></td>
            <td style="background-color: <?= ($venta['medio_venta'] == 'MERCADOLIBRE') ? 'yellow' : 'cyan' ?>"><?= $venta['medio_venta'] ?></td>
            <td><?= $venta['forma_pago'] ?></td>
            <td><?= $venta['fecha'] ?></td>
            <td id="facturaID"><a style="color: #000;" href="<?= $principalVentas ?>.php?id=<?= $venta['id_venta'] ?>&cliente=<?= $venta['nombre_razon'] ?>"><?= $venta['factura'] ?></a><a href="modificarFacturaVenta.php?id=<?= $venta['id_venta'] ?>&cliente=<?= $venta['nombre_razon'] ?>"><ion-icon name="create-outline"></ion-icon></a></td>
            <td><?= $venta['nombre_razon'] ?></td>
        </tr>

<?php
    }
}
?>
        </table>
    </div>







</body>
</html>