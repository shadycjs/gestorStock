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
    <title>RC Computers - Agregar Cliente</title>
</head>
<body>
    <a href="principalClientes.php">VOLVER</a>
    <form action="resultadoAgregarCliente.php" method="post" class="container__todo" enctype="multipart/form-data">
        <h1>AGREGUE UN CLIENTE NUEVO</h1>

        <div class="container_inputs">
            <label for="nombre">NOMBRE/RAZON DEL CLIENTE(*):</label>
            <input type="text" name="nombre" id="">
        </div>
        <div class="container_inputs">
            <label for="dni">CUIT/DNI(*):</label>
            <input type="number" name="dni" id="" step="0.01">
        </div>
        <div class="container_inputs">
            <label for="tel">TELEFONO(Opcional):</label>
            <input type="number" name="tel" id="">
        </div>
        <div class="container_inputs">
            <label for="mail">EMAIL(Opcional):</label>
            <input type="email" name="mail" id="">
        </div>
        <div class="container_inputs">
            <label for="provincia">PROVINCIA(*):</label>
            <select name="provincia" id="">
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="Buenos Aires Capital">Buenos Aires Capital</option>
                <option value="Catamarca">Catamarca</option>
                <option value="Chaco">Chaco</option>
                <option value="Chubut">Chubut</option>
                <option value="Cordoba">Cordoba</option>
                <option value="Corrientes">Corrientes</option>
                <option value="Entre Rios">Entre Rios</option>
                <option value="Formosa">Formosa</option>
                <option value="Jujuy">Jujuy</option>
                <option value="La Pampa">La Pampa</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Misiones">Misiones</option>
                <option value="Neuquen">Neuquen</option>
                <option value="Rio Negro">Rio Negro</option>
                <option value="Salta">Salta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Luis">San Luis</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Santiago del Estero">Santiago del Estero</option>
                <option value="Tierra del Fuego">Tierra del Fuego</option>
                <option value="Tucuman">Tucuman</option>
            </select>
        </div>
        <div class="container_inputs">
            <label for="ciudad">CIUDAD(*):</label>
            <input type="text" name="ciudad" id="">
        </div>
        <div class="container_inputs">
            <label for="calle">CALLE(*):</label>
            <input type="text" name="calle" id="">
        </div>
        <div class="container_inputs">
            <label for="postal">COD.POSTAL(*):</label>
            <input type="number" name="postal" id="">
        </div>
            <input type="submit" value="AGREGAR CLIENTE" id="agregar" name="enviar">
       

        
        
</form>

</body>
</html>
