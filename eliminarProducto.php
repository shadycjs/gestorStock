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
    <title>RC Computers - STOCK</title>
</head>
<body>

    <div class="container__todo">
        <h1>ELIMINAR PRODUCTO</h1>
        <a href="principal.php">VOLVER A INICIO</a>
        <div class="container__todo-sub">
            <form action="" method="get" class="container__todo-buscador">
                <button name="enviar"><ion-icon name="search-outline"></ion-icon></button>
                <input type="text" name="buscador" id="buscar_1">
            </form>
            <div class="container-todo-botones">
                <a href="agregarProducto.php" id="agregar">AGREGAR PRODUCTO</a>
                <a href="" id="eliminar">ELIMINAR PRODUCTO</a>
                <a href="modificarProducto.php" id="modificar">MODIFICAR PRODUCTO</a>
            </div>
            <form action="" method="post" class="container__todo-ordenar">
                <select name="ordenar" id="">
                    <option value="1">Menor Precio</option>
                    <option value="2">Mayor Precio</option>
                    <option value="3">En stock</option>
                    <option value="4">Listado TOTAL</option>
                </select>
                <input type="submit" value="Refrescar">
            </form>
        </div>
        
        <table>
        <form action="confirmarEliminarProducto.php" method="post">
            <tr class="container__todo-fila" id="fila__uno">
                <td>Categoria</td>
                <td>Marca</td>
                <td>Producto</td>
                <td>Precio</td>
                <td>Descripcion</td>
                <td>Stock</td>
            </tr>
<?php 

if(!empty($_GET['buscador'])){ // SI NO ESTA VACIO EL BUSCADOR
    $buscador = buscadorProductos();
    if(isset($_POST['ordenar'])){
        $buscador = ordenarProductosBuscador();
    }
        while( $row = mysqli_fetch_assoc( $buscador ) ){
            $css = 'background-color: #fff';
            if($row['Categoria'] == 'Microprocesador'){
                $css = 'background-color: orange';
            } elseif($row['Categoria'] == 'Motherboard'){
                $css = 'background-color: #1f8bfa';
            } elseif($row['Categoria'] == 'Memoria RAM'){
                $css = 'background-color: #0ba736';
            } elseif($row['Categoria'] == 'Disco Duro'){
                $css = 'background-color: black; color: #fff';
            } elseif($row['Categoria'] == 'Disco Sólido'){
                $css = 'background-color: cyan';
            } elseif($row['Categoria'] == 'Placa de video'){
                $css = 'background-color: pink';
            } elseif($row['Categoria'] == 'Gabinete'){
                $css = 'background-color: grey';
            } elseif($row['Categoria'] == 'Cooler'){
                $css = 'background-color: violet';
            }
?>
        <tr class="container__todo-fila" >
            <td><input style="<?= $css ?>" type="text" name="" id="" value="<?= $row['Categoria'] ?>" readonly="true"></td>
            <td><input type="text" name="" id="" value="<?= $row['Marca'] ?>" readonly="true"></td>
            <td><input type="text" name="" id="" value="<?= $row['Producto'] ?>" readonly="true"></td>
            <td><b><input type="number" name="" id="" value="<?= $row['Precio'] ?>" readonly="true"></b></td>
            <td><input type="text" name="" id="" value="<?= $row['Descripcion'] ?>" readonly="true"></td>
<?php
    $cssStock = 'background-color : green';
    if($row['stock'] == 1){
        $cssStock = 'background-color : yellow';
    } elseif($row['stock'] == 0){
        $cssStock = 'background-color : red';
    }
?>
            <td><b><input style="<?= $cssStock ?>" type="number" name="" id="" value="<?= $row['stock'] ?>" readonly="true"></b></td>
            <td><input type="checkbox" name="check[]" id="" value="<?= $row['id_producto'] ?>"></td>
        </tr>

<?php
        }
    } else { while( $producto = mysqli_fetch_assoc( $productos ) ){ // SI ESTA VACIO EL BUSCADOR ENTONCES...
        $css = 'background-color: #fff';
        if($producto['Categoria'] == 'Microprocesador'){
            $css = 'background-color: orange';
        } elseif($producto['Categoria'] == 'Motherboard'){
            $css = 'background-color: #1f8bfa';
        } elseif($producto['Categoria'] == 'Memoria RAM'){
            $css = 'background-color: #0ba736';
        } elseif($producto['Categoria'] == 'Disco Duro'){
            $css = 'background-color: black; color: #fff';
        } elseif($producto['Categoria'] == 'Disco Sólido'){
            $css = 'background-color: cyan';
        } elseif($producto['Categoria'] == 'Placa de video'){
            $css = 'background-color: pink';
        } elseif($producto['Categoria'] == 'Gabinete'){
            $css = 'background-color: grey';
        } elseif($producto['Categoria'] == 'Cooler'){
            $css = 'background-color: violet';
        }
        
?>  
        

        <tr class="container__todo-fila" >
            <td><input style="<?= $css ?>" type="text" name="" id="" value="<?= $producto['Categoria'] ?>" readonly="true"></td>
            <td><input type="text" name="" id="" value="<?= $producto['Marca'] ?>" readonly="true"></td>
            <td><input type="text" name="" id="" value="<?= $producto['Producto'] ?>" readonly="true"></td>
            <td><b><input type="number" name="" id="" value="<?= $producto['Precio'] ?>" readonly="true"></b></td>
            <td><input type="text" name="" id="" value="<?= $producto['Descripcion'] ?>" readonly="true"></td>
<?php
    $cssStock = 'background-color : green';
    if($producto['stock'] == 1){
        $cssStock = 'background-color : yellow';
    } elseif($producto['stock'] == 0){
        $cssStock = 'background-color : red';
    }
?>
            <td><b><input style="<?= $cssStock ?>" type="number" name="" id="" value="<?= $producto['stock'] ?>" readonly="true"></b></td>
            <td><input type="checkbox" name="check[]" id="" value="<?= $producto['id_producto'] ?>"></td>
        </tr>

<?php
    }
}
?>

        
        </table>
        <input type="submit" value="ELIMINAR" id="eliminarAbajo">
        </form>
        
    </div>







</body>
</html>
