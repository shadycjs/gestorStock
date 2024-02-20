<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\agregarCompra.css">
    <title>AGREGAR COMPRAS - ORDEN FINAL</title>
</head>
<body>
    
</body>
</html>
<?php
    error_reporting(E_ALL);
    require 'funciones/proveedores.php';
    require 'funciones/compras.php';
    require 'funciones/conexion.php';

    $proveedor = listarProveedores();

    session_start();

    if( isset($_POST['agregar']) ){

        $conexion = conectardb();

        $id = $_POST['idPrd'];

        $_SESSION['idPrd'] = $id;
    
        echo '<pre>';
        print_r($_SESSION['idPrd']);
        echo '</pre>';

        $cantidad = count($_POST['nombrePrd']);
        echo $cantidad;

        for( $i=0; $i<$cantidad; $i++){

            if($_POST['nombrePrd'][$i] == null){

            
?>
                    <div class="marcasNotSuccess">
                        <h1>NO SE CARGO NINGUN PRODUCTO</h1>
                        <a href="agregarCompra.php">Volver para intentarlo nuevamente...</a>
                    </div>
<?php   
        break;    
        }else{   
                $insertar = agregarProductoCompra( $i );
            }
        }
    }

?>
    <form action="resultadoAgregarCompra.php" method="post" class="container__todo" enctype="multipart/form-data">
        <div class="container__todo__sub">
            <a href="agregarCompra.php">VOLVER</a>
            <div class="container__todo__sub-inputs">
                <label for="nroCompra">Nro Compra:</label>
                <input type="number" name="nroCompra" id="">
            </div>
            <div class="container__todo__sub-inputs">
                <label for="fecha">Fecha de compra:</label>
                <input type="date" name="fecha" id="">
            </div>
            <div class="container__todo__sub-inputs">
                <label for="Proveedor">Proveedor:</label>
                <select name="proveedor">
<?php
    while( $prove = mysqli_fetch_assoc($proveedor) ){
?>
                    <option value="<?= $prove['id_proveedor']; ?>"><?= $prove['razon_social'] ?></option>
<?php
    }
?>
                </select>
            </div>
            <div class="container__todo__sub-inputs">
                <label for="factura">Suba la factura de compra:</label>
                <input type="file" name="factura" id="">
            </div>
            <input type="hidden" name="idPrd[]" value="<?= $_SESSION['idPrd'] ?>">
            <input type="submit" value="AGREGAR ORDEN" name="agregarOrden" id="agregar">
            
    </form>
