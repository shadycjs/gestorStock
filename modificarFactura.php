<?php
    require 'funciones/conexion.php';
    require 'funciones/compras.php';

    if( isset($_POST['agregar']) ){
        $agregarfactura = modificarFactura();
    }

    $prove = $_GET['prove'];

    $css = 'color: #fff';
    if($prove == 'JUKEBOX S.A'){
        $css = 'color: #48a0f9';
    } elseif($prove == 'NEWTON STATION S.R.L.'){
        $css = 'color: #82162c';
    } elseif($prove == 'ELIT S.A'){
        $css = 'color: orange';
    } elseif($prove == 'NB DISTRIBUIDORA MAYORISTA S R L'){
        $css = 'color: #1d5193';
    } elseif($prove == 'MICRO GLOBAL S.R.L.'){
        $css = 'color: #53b092';
    } elseif($prove == 'PC-ARTS ARGENTINA S.A'){
        $css = 'color: black; color: #fff';
    } elseif($prove == 'STYLUS S.A'){
        $css = 'color: #aa96f4';
    } elseif($prove == 'INTERMACO S R L'){
        $css = 'color: #e1ba70';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\stock.css">
    <title>MODIFICAR FACTURA</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data" class="container__todo">
    <a href="principalCompras.php">VOLVER</a>
    <h1>SUBE TU FACTURA PARA LA ORDEN NRO: <b style="<?= $css ?>"><?= $_GET['orden'] ?></b> </h1>
    <div class="container__inputs">
            <label for="nombre">FACTURA:</label>
            <input type="file" name="factura" id="">
    </div>
    <input type="submit" value="AGREGAR FACTURA" id="agregar" name="agregar">
</form>
    
</body>
</html>
