<?php
    /*########
        CRUD de compras detalladas
    */########

    function listarComprasDetalladas(): mysqli_result
    {
        $link = conectardb();
        $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                    INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                        INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function ordenarComprasDetalladas()
    {
        $link = conectardb();
        $tipoOrdenamiento = $_POST['ordenar'];
    
    
        if($tipoOrdenamiento == 2){
            $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                ORDER BY pv.razon_social";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 3) {
            $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                ORDER BY c.fecha";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 4) {
            $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                ORDER BY pc.precio_unit";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }elseif($tipoOrdenamiento == 5) {
            $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                ORDER BY pc.precio_unit DESC";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }else {
            $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
    }   

    function buscadorComprasDetalladas()
    {
        $link = conectardb();
        $busqueda = $_GET['buscador'];
        $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                    INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                        INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                            WHERE c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%' OR pc.nombre LIKE '%$busqueda%' ";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function ordenarComprasDetalladasBuscador()
    {
        $link = conectardb();
        $tipoOrdenamiento = $_POST['ordenar'];
        $busqueda = $_GET['buscador'];
    
    
        if($tipoOrdenamiento == 2){
            $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                WHERE c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%' OR pc.nombre LIKE '%$busqueda%'
                                    ORDER BY pv.razon_social";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 3) {
            $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                WHERE c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%' OR pc.nombre LIKE '%$busqueda%'
                                    ORDER BY c.fecha";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 4) {
            $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                WHERE c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%' OR pc.nombre LIKE '%$busqueda%'
                                    ORDER BY pc.precio_unit";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }elseif($tipoOrdenamiento == 5) {
            $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                WHERE c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%' OR pc.nombre LIKE '%$busqueda%'
                                    ORDER BY pc.precio_unit DESC";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }else {
            $sql = "SELECT c.nro_compra, c.fecha, pc.nombre AS PRODUCTO, pc.precio_unit, pc.cantidad, pv.razon_social AS PROVEEDOR FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                WHERE c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%' OR pc.nombre LIKE '%$busqueda%'";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
    }   