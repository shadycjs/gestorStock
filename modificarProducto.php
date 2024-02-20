<?php
    require 'funciones\productos.php';

    $productos = listarProductos();
 
    if(isset($_POST['ordenar'])){
        $productos = ordenarProductos();
    }
    $stock = verPrecioStock();
    
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
    <title>RC Computers - MODIFICAR PRODUCTO</title>
</head>
<body>

    <div class="container__todo">
    <h1>MODIFICAR PRODUCTO</h1>
        <a href="principal.php">VOLVER A INICIO</a>
        <div class="container__todo-sub">
            <form action="" method="get" class="container__todo-buscador">
                <button name="enviar"><ion-icon name="search-outline"></ion-icon></button>
                <input type="text" name="buscador" id="buscar_1">
            </form>
            <div class="container-todo-botones">
                <a href="agregarProducto.php" id="agregar">AGREGAR PRODUCTO</a>
                <a href="eliminarProducto.php" id="eliminar">ELIMINAR PRODUCTO</a>
                <a href="modificarProducto.php" id="modificar">MODIFICAR PRODUCTO</a>
            </div>
            <form action="" method="post" class="container__todo-ordenar">
                <select name="ordenar" id="">
                    <option value="1">Menor Precio</option>
                    <option value="2">Mayor Precio</option>
                    <option value="3">Por defecto</option>
                                        <option value="3">En stock</option>
                    <option value="4">Listado TOTAL</option>
                </select>
                <input type="submit" value="Refrescar">
            </form>
        </div>


        <table>
        <form action="" method="post" class="formEliminarMarca">
            <tr class="container__todo-fila" id="fila__uno">
                <td>Id</td>
                <td>Categoria</td>
                <td>Marca</td>
                <td>Producto</td>
                <td>Precio</td>
                <td>Descripcion</td>
                <td>Stock</td>
            </tr>
<?php 

if(!empty($_GET['buscador'])){ // SI NO ESTA VACIO EL BUSCADOR
    $busqueda = $_GET['buscador'];
    $link = conectardb();
    $consulta ="SELECT id_producto, m.id_marca, m.nombre_marca, c.id_categoria, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
    INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
        INNER JOIN MARCA m ON p.id_mar = m.id_marca
            WHERE p.nombre_producto LIKE '%$busqueda%' AND stock > 0 OR m.nombre_marca LIKE '%$busqueda%' AND stock > 0 OR c.nombre_cat LIKE '%$busqueda%' AND stock > 0 OR id_producto LIKE '%$busqueda%' AND stock > 0";
    $resultado = mysqli_query( $link,$consulta );

        while( $row = mysqli_fetch_assoc( $resultado ) ){
?>
        <tr class="container__todo-fila">
        <td><input type="number" name="idprod[<?= $row['id_producto'] ?>]" class="container__todo--input" value="<?= $row['id_producto'] ?>"></td>
        <td><select name="cat[<?= $row['id_producto'] ?>]" class="container__todo--input">
                <option value="<?= $row['id_categoria'] ?>"><?= $row['Categoria'] ?></option>
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
            </select></td>   
            <td><select name="marca[<?= $row['id_producto'] ?>]" class="container__todo--input">
                <option value="<?= $row['id_marca'] ?>"><?= $row['Marca'] ?></option>
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
            </select></td>
            <td><input type="text" class="container__todo--input" name="prod[<?= $row['id_producto'] ?>]" id="" value="<?= $row['Producto'] ?>"></td>
            <td><b><input type="number" class="container__todo--input" name="precio[<?= $row['id_producto'] ?>]" min="0" step="0.01" value="<?= $row['Precio'] ?>"></b></td>
            <td><input type="text" class="container__todo--input" name="desc[<?= $row['id_producto'] ?>]" value="<?= $row['Descripcion'] ?>"></td>
<?php
    if($row['stock'] == 1){
?>
            <td><b><input style="background-color: yellow" class="container__todo--input" type="number" name="stock[<?= $row['id_producto'] ?>]" value="<?= $row['stock'] ?>"></b></td>
<?php
    } elseif($row['stock'] >= 2) {
?>
            <td><b><input style="background-color: green" class="container__todo--input" type="number" name="stock[<?= $row['id_producto'] ?>]" value="<?= $row['stock'] ?>"></b></td>
<?php
    } else{
?>
            <td><b><input style="background-color: red" class="container__todo--input" type="number" name="stock[<?= $row['id_producto'] ?>]" value="<?= $row['stock'] ?>"></b></td>
<?php
    }
?>
           
            </tr>
    
<?php 

    $numeroFilas = mysqli_num_rows($resultado);
    echo $numeroFilas;
    if($numeroFilas == 0){
        echo'NO HAY PRODUCTOS CON ESAS CARACTERISTICAS';
    }
}
    } else { while( $producto = mysqli_fetch_assoc( $productos ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...
?>  


        <tr class="container__todo-fila">
        
        <td><input type="number" name="idprod[<?= $producto['id_producto'] ?>]" class="container__todo--input" value="<?= $producto['id_producto'] ?>"></td>
        <td><select name="cat[<?= $producto['id_producto'] ?>]" class="container__todo--input">
                <option value="<?= $producto['id_categoria'] ?>"><?= $producto['Categoria'] ?></option>
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
            </select></td>   
            <td><select name="marca[<?= $producto['id_producto'] ?>]" class="container__todo--input">

                <option value="<?= $producto['id_marca'] ?>"><?= $producto['Marca'] ?></option>
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
            </select></td>
            <td><input type="text" name="prod[<?= $producto['id_producto'] ?>]" class="container__todo--input" value="<?= $producto['Producto'] ?>"></td>
            <td><b><input step="0.01" type="number" name="precio[<?= $producto['id_producto'] ?>]" class="container__todo--input" value="<?= $producto['Precio'] ?>"></b></td>
            <td><input type="text" name="desc[<?= $producto['id_producto'] ?>]" class="container__todo--input" value="<?= $producto['Descripcion'] ?>"></td>
<?php
    if($producto['stock'] == 1){
?>
            <td><b><input style="background-color: yellow" class="container__todo--input" type="number" name="stock[<?= $producto['id_producto'] ?>]" value="<?= $producto['stock'] ?>"></b></td>
<?php
    } elseif($producto['stock'] >= 2) {
?>
            <td><b><input style="background-color: green" class="container__todo--input" type="number" name="stock[<?= $producto['id_producto'] ?>]" value="<?= $producto['stock'] ?>"></b></td>
<?php
    } else{
?>
            <td><b><input style="background-color: red" class="container__todo--input" type="number" name="stock[<?= $producto['id_producto'] ?>]" value="<?= $producto['stock'] ?>"></b></td>
<?php
    }
?>
            
        </tr>
        
        

<?php
    }
}
?>
    

            </table>
        </table>
    <input type="submit" value="Guardar Cambios" name="guardar" id="agregarAbajo">
 </form>
 
<?php
    if(isset($_POST['guardar'])){
        $conexion = conectardb();
        foreach( $_POST['idprod'] as $ids )
        {
            $editID = mysqli_real_escape_string($conexion, $_POST['idprod'][$ids]);
            $editCat = mysqli_real_escape_string($conexion, $_POST['cat'][$ids]);
            $editMar = mysqli_real_escape_string($conexion, $_POST['marca'][$ids]);
            $editProd = mysqli_real_escape_string($conexion, $_POST['prod'][$ids]);
            $editPrecio = mysqli_real_escape_string($conexion, $_POST['precio'][$ids]);
            $editDesc = mysqli_real_escape_string($conexion, $_POST['desc'][$ids]);
            $editStock = mysqli_real_escape_string($conexion, $_POST['stock'][$ids]);

            $actualizar = $conexion->query("UPDATE producto SET nombre_producto = '$editProd', precio_unit = '$editPrecio', descripcion = '$editDesc', stock = '$editStock', id_cat = '$editCat', id_mar = '$editMar' WHERE id_producto = '$editID'");
        }
    }
?>

</body>
</html>
