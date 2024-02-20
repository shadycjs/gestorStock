<?php
    require 'funciones/productos.php';
    require 'funciones/clientes.php';
    $clientes = listarClientes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\agregarProducto.css">
    <title>RC Computers - Agregar Venta</title>
</head>
<body>
    <a href="principalVentas.php">VOLVER</a>
    <form action="resultadoAgregarVenta.php" method="post" class="container__todo" enctype="multipart/form-data">
        <h1>AGREGUE UNA VENTA NUEVA</h1>

        <div class="container_inputs">
            <label for="nombre">NOMBRE DEL PRODUCTO:</label>
            <input type="text" name="nombre" id="">
        </div>
        <div class="container_inputs">
            <label for="precio">PRECIO:</label>
            <input type="number" name="precio" id="" step="0.01">
        </div>
        <div class="container_inputs">
            <label for="cantidad">CANTIDAD:</label>
            <input type="text" name="cantidad" id="">
        </div>
        <div class="container_inputs">
            <label for="medio">MEDIO DE VENTA:</label>
            <select name="medio" id="">
                <option value="POR FUERA">POR FUERA</option>
                <option value="MERCADOLIBRE">MERCADOLIBRE</option>
            </select>
        </div>
        <div class="container_inputs">
            <label for="forma">FORMA DE PAGO:</label>
            <select name="forma" id="">
                <option value="TRANSF.BANCARIA">TRANSF.BANCARIA</option>
                <option value="MERCADOPAGO">MERCADOPAGO</option>
                <option value="DEPOSITO">DEPOSITO</option>
            </select>
        </div>
        <div class="container_inputs" id="factura">
            <label for="factura">ADJUNTE LA FACTURA:</label>
            <input type="file" name="factura" id="">
            <label for="tipofac">SELECCIONE EL TIPO DE FACTURA</label>
            <select name="tipofac" id="">
                <option value="Aún no emitida">Aún no emitida</option>
                <option value="A">Factura A</option>
                <option value="B">Factura B</option>
            </select>
        </div>
        <div class="container_inputs">
            <label for="stock">FECHA:</label>
            <input type="date" name="fecha" id="">
        </div>
        <div class="container_inputs">
            <label for="cliente">CLIENTE:</label>
            <select name="cliente" id="">
<?php
    while( $cliente = mysqli_fetch_assoc($clientes) ){
?>
                <option value="<?= $cliente['id_cliente'] ?>"><?= $cliente['nombre_razon'] ?></option>
<?php
    }
?>
            </select>
        </div>
            <input type="submit" value="AGREGAR VENTA" id="agregar" name="enviar">
       

        
        
</form>

</body>
</html>
