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
    <title>RC Computers - MODIFICAR CLIENTES</title>
</head>
<body>

    <div class="container__todo">
        <h1>MODIFICAR CLIENTES</h1>

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
        <form action="" method="post" enctype="multipart/form-data">
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
        
        <tr style="<?= $css ?>" class="container__todo-fila" >
            <td><?= $row['nro_compra'] ?></td>
            <td><?= $row['fecha'] ?></td>
            <td><?= $row['PROVEEDOR'] ?></td>
            <td><b><?= $row['TOTAL'] ?></b></td>
        </tr>

<?php
    
        }
    } else { while( $cliente = mysqli_fetch_assoc( $clientes ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...
        
?>  
        
        <tr class="container__todo-fila" >
        <td><input type="number" name="id[<?= $cliente['id_cliente'] ?>]" value="<?= $cliente['id_cliente'] ?>"></td>
            <td><input type="text" name="nombre[<?= $cliente['id_cliente'] ?>]" value="<?= $cliente['nombre_razon'] ?>"></td>
            <td><input type="text" name="dni[<?= $cliente['id_cliente'] ?>]" value="<?= $cliente['cuit_dni'] ?>"></td>
            <td><input type="number" name="tel[<?= $cliente['id_cliente'] ?>]" value="<?= $cliente['telefono'] ?>"></td>
            <td><input type="text" name="mail[<?= $cliente['id_cliente'] ?>]" value="<?= $cliente['email'] ?>"></td>
            <td><input type="text" name="provincia[<?= $cliente['id_cliente'] ?>]" value="<?= $cliente['provincia'] ?>"></td>
            <td><input type="text" name="ciudad[<?= $cliente['id_cliente'] ?>]" value="<?= $cliente['ciudad'] ?>"></td>
            <td><input type="text" name="calle[<?= $cliente['id_cliente'] ?>]" value="<?= $cliente['calle'] ?>"></td>
            <td><input type="number" name="postal[<?= $cliente['id_cliente'] ?>]" value="<?= $cliente['codigo_postal'] ?>"></td>
            <td><input type="text" name="factura[<?= $cliente['id_cliente'] ?>]" value="<?= $cliente['factura'] ?>"></td>
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

        foreach( $_POST['id'] as $ids )
        {
            $modificarCliente = modificarCliente($ids);
        }
    }
?>





</body>
</html>