<?php
    require 'funciones\clientes.php';
    require 'funciones/conexion.php';
    $clientes = listarClientes();
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
    <title>RC Computers - ELIMINAR CLIENTES</title>
</head>
<body>

    <div class="container__todo">
        <h1>ELIMINAR CLIENTES</h1>

        <div class="container__todo-sub">
            <form action="" method="get" class="container__todo-buscador">
                <button name="enviar"><ion-icon name="search-outline"></ion-icon></button>
                <input type="text" name="buscador" id="buscar_1">
            </form>
            <a href="principalClientes.php">VOLVER</a>
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
        <form action="confirmarEliminarCliente.php" method="post">
            <tr class="container__todo-fila" id="fila__uno">
                <td>ID Cliente</td>
                <td>Nombre/Razon</td>
                <td>CUIT/DNI</td>
                <td>Telefono</td>
                <td>Mail</td>
                <td>Provincia</td>
                <td>Ciudad</td>
                <td>Calle</td>
                <td>Codigo postal</td>
                <td>Factura</td>
            </tr>
<?php 

if(!empty($_GET['buscador'])){ // SI NO ESTA VACIO EL BUSCADOR
    $buscador = buscadorCompras();
    if(isset($_POST['ordenar'])){
        $buscador = ordenarComprasBuscador();
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

            <td><input type="checkbox" name="check[]" id="" value="<?= $row['id_cliente'] ?>"></td>
        </tr>

<?php
    
        }
    } else { while( $cliente = mysqli_fetch_assoc( $clientes ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...

?>  
        
        <tr class="container__todo-fila" >
            <td><input readonly="true" type="number" name="id[]" value="<?= $cliente['id_cliente'] ?>"></td>
            <td><input readonly="true" type="text" value="<?= $cliente['nombre_razon'] ?>"></td>
            <td><input readonly="true" type="text" value="<?= $cliente['cuit_dni'] ?>"></td>
            <td><input readonly="true" type="number" value="<?= $cliente['telefono'] ?>"></td>
            <td><input readonly="true" type="email" value="<?= $cliente['email'] ?>"></td>
            <td><input readonly="true" type="text" value="<?= $cliente['provincia'] ?>"></td>
            <td><input readonly="true" value="<?= $cliente['ciudad'] ?>"></td>
            <td><input readonly="true" type="text" value="<?= $cliente['calle'] ?>"></td>
            <td><input readonly="true" type="number" value="<?= $cliente['codigo_postal'] ?>"></td>
            <td><input readonly="true" type="text" value="<?= $cliente['factura'] ?>"></td>

            <td><input type="checkbox" name="check[]" id="" value="<?= $cliente['id_cliente'] ?>"></td>
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