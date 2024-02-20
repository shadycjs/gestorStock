<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\agregarCompra.css">
    <title>RC Computers - AGREGAR COMPRA</title>
</head>

<?php
    require 'funciones/conexion.php';
    require 'funciones/proveedores.php';
    require 'funciones/compras.php';
    session_start();
    if(isset($_POST['siguiente'])){
        $cantProductos = $_POST['cantidadPrd'];

        
        if($cantProductos == 0 || $cantProductos == null){
?>
            
                    <div class="marcasNotSuccess">
                        <h1>NO SE CARGO NINGUN PRODUCTO</h1>
                        <a href="agregarCompra.php">Volver para intentarlo nuevamente...</a>
                    </div>

<?php
                    }else{
    
?>


<body>
    <form method="post" action="agregarCompraOrden.php" enctype="multipart/form-data" class="container__todo">
        <a href="agregarCompra.php">VOLVER</a>
        <h1>AGREGAR PRODUCTOS</h1>
<?php
    for( $i=0; $i<$cantProductos; $i++ ){
?>
        <div class="container__todo__sub">
            <div class="container__todo__sub-inputs">
                <label for="nombrePrd">Nombre del producto:</label>
                <input type="text" name="nombrePrd[]" id="">
            </div>
            <div class="container__todo__sub-inputs">
                <label for="precioPrd">Precio del producto:</label>
                <input type="number" name="precioPrd[]" id="" step="0.01">
            </div>
            <div class="container__todo__sub-inputs">
                <label for="cantidadPrd">Cantidad:</label>
                <input type="number" name="cantidadPrd[]" id="">
            </div>
            <div class="container__todo__sub-inputs">
                <label for="ivaPrd">IVA:</label>
                <select name="ivaPrd[]">
                    <option value="1.105" step="0.01">1.105</option>
                    <option value="1.21" step="0.01">1.21</option>
                </select>
            </div>
            <div class="container__todo__sub-inputs">
                <label for="impPrd">Imp. Interno:</label>
                <select name="impPrd[]">
                    <option value="1" step="0.01">1</option>
                    <option value="1.2346" step="0.01">1.2346</option>
                </select>
            </div>
            <input type="hidden" name="idPrd[]" value="<?= rand() ?>">  
<?php
    }
}
}
?>
            <input type="submit" value="AGREGAR PRODUCTO" id="agregar" name="agregar">
        </div>
    </form>
</body>
</html>