<?php
    require 'funciones\clientes.php';
    require 'funciones/conexion.php';
    $clientes = listarClientes();
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
    <title>RC Computers - CLIENTES</title>
</head>
<body>

    <div class="container__todo">
        <h1>CLIENTES</h1>
        <a href="principalVentas.php">VOLVER</a>
        <div class="container__todo-sub">
            <form action="" method="get" class="container__todo-buscador">
                <button name="enviar"><ion-icon name="search-outline"></ion-icon></button>
                <input type="text" name="buscador" id="buscar_1">
            </form>
            <div class="container-todo-botones">
                <a href="agregarCliente.php" id="agregar">AGREGAR CLIENTE</a>
                <a href="eliminarCliente.php" id="eliminar">ELIMINAR CLIENTE</a>
                <a href="modificarCliente.php" id="modificar">MODIFICAR CLIENTE</a>
            </div>
            <form action="" method="post" class="container__todo-ordenar">
                <select name="ordenar" id="">
                    <option value="">Ordenar por...</option>
                    <option value="2">Provincia</option>
                    <option value="3">Nombre A-z</option>
                </select>
                <input type="submit" value="Refrescar">
            </form>
        </div>
        <table>

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
    } else { while( $cliente = mysqli_fetch_assoc( $clientes ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...
        $principalCompras = 'principalCompras';

        if($cliente['factura'] == 'SUBIR FACTURA'){
            $principalCompras = 'modificarFactura';
        }
?>  
        
        <tr class="container__todo-fila" >
            <td><?= $cliente['id_cliente'] ?></td>
            <td><?= $cliente['nombre_razon'] ?></td>
            <td><?= $cliente['cuit_dni'] ?></td>
            <td><?= $cliente['telefono'] ?></td>
            <td><?= $cliente['email'] ?></td>
            <td><?= $cliente['provincia'] ?></td>
            <td><?= $cliente['ciudad'] ?></td>
            <td><?= $cliente['calle'] ?></td>
            <td><?= $cliente['codigo_postal'] ?></td>
            <td><?= $cliente['factura'] ?></td>
        </tr>

<?php
    }
}
?>
        </table>
    </div>







</body>
</html>