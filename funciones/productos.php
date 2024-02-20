<?php

    require 'C:\xampp\htdocs\RC\GestorStock\funciones\conexion.php';



    /*########
        CRUD de productos
    */########

    function listarProductos() : mysqli_result
    {
        $link = conectardb();
        $sql = "SELECT id_producto, m.id_marca, m.nombre_marca, c.id_categoria, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
                    INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                        INNER JOIN MARCA m ON p.id_mar = m.id_marca
                            WHERE stock > 0";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function agregarProductos($nombre, $precio, $desc, $stock, $cat, $mar)
    {
        $link = conectardb();
        $sql = "INSERT INTO producto 
                (nombre_producto, precio_unit, descripcion, stock, id_cat, id_mar) 
                VALUES 
                ('$nombre', '$precio', '$desc', '$stock', '$cat', '$mar')";
        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            //echo $e->getMessage(); <- Eso es para mostrarlo en pantalla
            return FALSE;
            echo 'NO SE PUDO AGREGAR EL PRODUCTO';
        }
    }

    function verPrecioStock() : mysqli_result
    {
        $link = conectardb();
        $sql = "SELECT * FROM STOCK_TOTAL_USD";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function modificarProductos() : BOOL
    {
        $link = conectardb();

        $idProd = $_POST[$producto['id_producto']];
        $nombreProd = $_POST['prod'];
        $precio = $_POST['precio'];
        $desc = $_POST['desc'];
        $stock = $_POST['stock'];
        $cat = $_POST['cat'];
        $mar = $_POST['marca'];

        $sql = "UPDATE producto SET nombre_producto = '$nombreProd', precio_unit = '$precio', descripcion = '$desc', stock = '$stock', id_cat = '$cat', id_mar = '$mar' WHERE id_producto = '$idProd'";
        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            //echo $e->getMessage(); <- Eso es para mostrarlo en pantalla
            return FALSE;
        }
    }

    function ordenarProductos()
    {
        $link = conectardb();
        $tipoOrdenamiento = $_POST['ordenar'];

        if($tipoOrdenamiento == 1){
            $sql = "SELECT id_producto, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
            INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                INNER JOIN MARCA m ON p.id_mar = m.id_marca
                    WHERE stock > 0
                        ORDER BY p.precio_unit";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 2){
            $sql = "SELECT id_producto, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
            INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                INNER JOIN MARCA m ON p.id_mar = m.id_marca
                    WHERE stock > 0
                        ORDER BY p.precio_unit DESC";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 3) {
            $sql = "SELECT id_producto, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
            INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                INNER JOIN MARCA m ON p.id_mar = m.id_marca
                    WHERE stock > 0";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 4) {
            $sql = "SELECT id_producto, m.id_marca, m.nombre_marca, c.id_categoria, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
            INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                INNER JOIN MARCA m ON p.id_mar = m.id_marca";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } else {
            $sql = "SELECT id_producto, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
            INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                INNER JOIN MARCA m ON p.id_mar = m.id_marca
                    WHERE stock > 0";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
    }


    function buscadorProductos()
    {
        $link = conectardb();
        $busqueda = $_GET['buscador'];
        $sql = "SELECT id_producto, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
                    INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                        INNER JOIN MARCA m ON p.id_mar = m.id_marca
                            WHERE p.nombre_producto LIKE '%$busqueda%' AND stock > 0 OR m.nombre_marca LIKE '%$busqueda%' AND stock > 0 OR c.nombre_cat LIKE '%$busqueda%' AND stock > 0";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function ordenarProductosBuscador()
    {
        $link = conectardb();
        $tipoOrdenamiento = $_POST['ordenar'];
        $busqueda = $_GET['buscador'];

        if($tipoOrdenamiento == 1){
            $sql = "SELECT id_producto, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
            INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                INNER JOIN MARCA m ON p.id_mar = m.id_marca
                    WHERE p.nombre_producto LIKE '%$busqueda%' AND stock > 0 OR m.nombre_marca LIKE '%$busqueda%' AND stock > 0 OR c.nombre_cat LIKE '%$busqueda%' AND stock > 0
                        ORDER BY p.precio_unit";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 2){
            $sql = "SELECT id_producto, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
            INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                INNER JOIN MARCA m ON p.id_mar = m.id_marca
                    WHERE p.nombre_producto LIKE '%$busqueda%' AND stock > 0 OR m.nombre_marca LIKE '%$busqueda%' AND stock > 0 OR c.nombre_cat LIKE '%$busqueda%' AND stock > 0
                        ORDER BY p.precio_unit DESC";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 3) {
            $sql = "SELECT id_producto, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
            INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                INNER JOIN MARCA m ON p.id_mar = m.id_marca
                    WHERE p.nombre_producto LIKE '%$busqueda%' AND stock > 0 OR m.nombre_marca LIKE '%$busqueda%' AND stock > 0 OR c.nombre_cat LIKE '%$busqueda%' AND stock > 0";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 4) {
            $sql = "SELECT id_producto, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
            INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                INNER JOIN MARCA m ON p.id_mar = m.id_marca
                    WHERE p.nombre_producto LIKE '%$busqueda%' OR m.nombre_marca LIKE '%$busqueda%' OR c.nombre_cat LIKE '%$busqueda%'";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } else {
            $sql = "SELECT id_producto, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
            INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
                INNER JOIN MARCA m ON p.id_mar = m.id_marca
                    WHERE stock > 0";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
    }

    function verProductoPorId( int $id )
    {
        $link = conectardb();

        $sql = "SELECT id_producto, m.id_marca, m.nombre_marca, c.id_categoria, c.nombre_cat AS Categoria, m.nombre_marca AS Marca, p.nombre_producto AS Producto, p.precio_unit AS Precio, p.descripcion AS Descripcion, p.stock FROM PRODUCTO p
        INNER JOIN CATEGORIA c ON p.id_cat = c.id_categoria
            INNER JOIN MARCA m ON p.id_mar = m.id_marca
                WHERE id_producto = $id";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function eliminarProductos( int $idElim ) : bool
    {
        $link = conectardb();

        $sql = "DELETE FROM producto WHERE id_producto = $idElim";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

/*
 *  listarProductos()
    verProductoPorID()
    agregarProducto()
    modificarProducto()
    eliminarProducto()
 * */
    



    