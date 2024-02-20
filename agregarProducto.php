<?php
    require 'funciones/productos.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\agregarProducto.css">
    <title>RC Computers - Agregar Producto</title>
</head>
<body>
    <a href="principal.php">VOLVER</a>
    <form action="" method="post" class="container__todo">
        <h1>AGREGUE UN PRODUCTO NUEVO</h1>

        <div class="container_inputs">
            <label for="nombre">NOMBRE:</label>
            <input type="text" name="nombre" id="">
        </div>
        <div class="container_inputs">
            <label for="precio">PRECIO:</label>
            <input type="number" name="precio" id="" step="0.01">
        </div>
        <div class="container_inputs">
            <label for="descripcion">DESCRIPCION:</label>
            <input type="text" name="descripcion" id="">
        </div>
        <div class="container_inputs">
            <label for="stock">STOCK:</label>
            <input type="number" name="stock" id="">
        </div>
        <div class="container_inputs">
            <label for="cat">CATEGORIA:</label>
            <select name="cat" id="">
                <option value="1">Microprocesador</option>
                <option value="2">Motherboard</option>
                <option value="3">Memoria RAM</option>
                <option value="4">Disco Duro</option>
                <option value="5">Disco Solido</option>
                <option value="6">Placa de video</option>
                <option value="7">Gabinete</option>
                <option value="8">Fuente</option>
                <option value="9">Mouse</option>
                <option value="10">Teclado</option>
                <option value="11">Cooler</option>
                <option value="12">Parlante</option>
                <option value="13">Webcam</option>
                <option value="14">Placa WiFi</option>
            </select>
        </div>
        <div class="container_inputs">
            <label for="marca">MARCA:</label>
            <select name="marca" id="">
                <option value="1">AMD</option>
                <option value="2">Intel</option>
                <option value="3">Magnum Tech</option>
                <option value="4">Cooler Master</option>
                <option value="5">Cromax</option>
                <option value="6">Thermaltake</option>
                <option value="7">MSI</option>
                <option value="8">Aureox</option>
                <option value="9">Gigabyte</option>
                <option value="10">Asus</option>
                <option value="11">AsRock</option>
                <option value="12">Kingston</option>
                <option value="13">Crucial</option>
                <option value="14">Corsair</option>
                <option value="15">Patriot</option>
                <option value="16">HP</option>
                <option value="17">Adata</option>
                <option value="18">Netac</option>
                <option value="19">Seagate</option>
                <option value="20">Western Digital</option>
                <option value="21">EVGA</option>
                <option value="22">Trust Ziva</option>
                <option value="23">TP-link</option>
                <option value="24">Nvidia</option>
                <option value="25">Id Cooling</option>
            </select>
        </div>
            <input type="submit" value="AGREGAR PRODUCTO" id="agregar" name="enviar">
       

        
        
</form>

</body>
</html>

<?php

    if(isset($_POST['enviar'])){
        agregarProductos( $_POST['nombre'], $_POST['precio'] , $_POST['descripcion'] , $_POST['stock'] , $_POST['cat'] , $_POST['marca'] );
    }

?>