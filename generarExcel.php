<?php
    require 'funciones\productos.php';
    $productos = listarProductos();
    $stock = verPrecioStock();
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=".date("d-m-y")."_stock-productos.xls");
?>

<table style="border: 1px solid black">
            <caption><h1>STOCK COMPONENTES DISPONIBLES RC COMPUTERS</h1></caption>
            <tr class="container__todo-fila" id="fila__uno">
                <td>Categoria</td>
                <td>Marca</td>
                <td>Producto</td>
                <td>Descripcion</td>
                <td>Precio</td>
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
                $css = 'background-color: blue';
            } elseif($row['Categoria'] == 'Memoria RAM'){
                $css = 'background-color: green';
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
        <tr class="container__todo-fila">
            <td style="<?= $css ?>"><?= $row['Categoria'] ?></td>
            <td><?= $row['Marca'] ?></td>
            <td><?= $row['Producto'] ?></td>
            <td><?= $row['Descripcion'] ?></td>
            <td><b><?= $row['Precio'] ?></b></td>
<?php
    $cssStock = 'background-color : green';
    if($row['stock'] == 1){
        $cssStock = 'background-color : yellow';
    } elseif($row['stock'] == 0){
        $cssStock = 'background-color : red';
    }
?>
            <td style="<?= $cssStock ?>"><b><?= $row['stock'] ?></b></td>

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
            <td style="<?= $css ?>; text-align: center; vertical-align: middle;"><?= $producto['Categoria'] ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $producto['Marca'] ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $producto['Producto'] ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $producto['Descripcion'] ?></td>
            <td style="text-align: center; vertical-align: middle;"><b><?= $producto['Precio'] ?></b></td>
<?php
    $cssStock = 'background-color : green';
    if($producto['stock'] == 1){
        $cssStock = 'background-color : yellow';
    } elseif($producto['stock'] == 0){
        $cssStock = 'background-color : red';
    }
?>
            <td style="<?= $cssStock ?>; text-align: center; vertical-align: middle;"><b><?= $producto['stock'] ?></b></td>

        </tr>
        
<?php
    }
}
?>
            <caption><h1 style="color: green; text-align: center; vertical-align: middle;">VALOR TOTAL DEL STOCK USD: <?php while( $fila = mysqli_fetch_assoc( $stock ) ){ echo $fila['VALOR_TOTAL_STOCK_USD']; } ?></h1></caption>
        </table>