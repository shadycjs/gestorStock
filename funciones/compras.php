<?php

    /*########
        CRUD de compras
    */########

    function listarCompras(): mysqli_result
    {
        $link = conectardb();
        $sql = "SELECT pc.id_producto_compra, c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                    INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                        INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                            GROUP BY c.nro_compra;";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function ordenarCompras()
    {
        $link = conectardb();
        $tipoOrdenamiento = $_POST['ordenar'];
    
    
        if($tipoOrdenamiento == 2){
            $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                GROUP BY c.nro_compra
                                    ORDER BY pv.razon_social";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 3) {
            $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                GROUP BY c.nro_compra
                                    ORDER BY c.fecha";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 4) {
            $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                GROUP BY c.nro_compra
                                    ORDER BY TOTAL";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }elseif($tipoOrdenamiento == 5) {
            $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                GROUP BY c.nro_compra
                                    ORDER BY TOTAL DESC";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }else {
            $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                GROUP BY c.nro_compra";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
    }   

    function buscadorCompras()
    {
        $link = conectardb();
        $busqueda = $_GET['buscador'];
        $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                    INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                        INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                            GROUP BY c.nro_compra
                                HAVING c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%' ";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function ordenarComprasBuscador()
    {
        $link = conectardb();
        $tipoOrdenamiento = $_POST['ordenar'];
        $busqueda = $_GET['buscador'];
    
    
        if($tipoOrdenamiento == 2){
            $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                GROUP BY c.nro_compra
                                    HAVING c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%'
                                            ORDER BY pv.razon_social";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 3) {
            $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                GROUP BY c.nro_compra
                                    HAVING c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%'
                                        ORDER BY c.fecha";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 4) {
            $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                GROUP BY c.nro_compra
                                    HAVING c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%'
                                        ORDER BY TOTAL";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }elseif($tipoOrdenamiento == 5) {
            $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                GROUP BY c.nro_compra
                                    HAVING c.nro_compra LIKE '%$busqueda%' OR pv.razon_social LIKE '%$busqueda%' OR c.fecha LIKE '%$busqueda%'
                                        ORDER BY TOTAL DESC";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }else {
            $sql = "SELECT c.factura, c.nro_compra, c.fecha, pv.razon_social AS PROVEEDOR, TRUNCATE(SUM(((precio_unit*pc.cantidad)*Imp_interno)*1.03) + SUM(TRUNCATE(((((precio_unit*iva))) - precio_unit), 2)* cantidad), 2)  AS TOTAL FROM COMPRA c
                        INNER JOIN PRODUCTO_COMPRA pc ON c.id_prod_compra = pc.id_producto_compra
                            INNER JOIN PROVEEDOR pv ON c.id_prov = pv.id_proveedor
                                GROUP BY c.nro_compra";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
    }
    
    function subirArchivo() : string
    {

      //si enviaron un archivo
      if( $_FILES['factura']['error'] == 0 ){

        $archivo = $_FILES['factura'];

        #### Mover el archivo desde /tmp a nuestra carpeta /productos
        $temp = $_FILES['factura']['tmp_name'];
        $ruta = 'facturas/';
        
        $extension = pathinfo( $_FILES['factura']['name'], PATHINFO_EXTENSION );
        $factura = time().'.'.$extension;
        move_uploaded_file( $temp,$ruta.$factura );

      }

      return $factura;
    }

    function bajarArchivo()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM compra WHERE id_prod_compra = '$id'";
        $link = conectardb();
        $resultado = mysqli_query($link, $sql);
    
        if (mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_assoc($resultado);
            $archivo = $fila['factura'];
            $ruta_archivo = "facturas/" . $archivo;
        
            // Verificar que el archivo exista en el servidor
            if (file_exists($ruta_archivo)) {
                // Enviar el archivo al navegador
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . $archivo . '"');
                readfile($ruta_archivo);
            } else {
                echo "El archivo no existe en el servidor.";
            }
        } else {
            echo "El archivo no se encontró en la base de datos.";
        }
    }

    function agregarProductoCompra( int $i ) : bool
    {
        $link = conectardb();

        $nombrePrd = mysqli_real_escape_string($link, $_POST['nombrePrd'][$i] );
        $precioPrd = mysqli_real_escape_string($link, $_POST['precioPrd'][$i] );
        $cantidadPrd = mysqli_real_escape_string($link, $_POST['cantidadPrd'][$i] );
        $ivaPrd = mysqli_real_escape_string($link, $_POST['ivaPrd'][$i] );
        $impPrd = mysqli_real_escape_string($link, $_POST['impPrd'][$i] );
        $idPrd = mysqli_real_escape_string($link, $_POST['idPrd'][$i] );

        $sql = "INSERT INTO producto_compra 
        (id_producto_compra, nombre, precio_unit, cantidad, IVA, Imp_interno) 
        VALUES
        ( '$idPrd', '$nombrePrd', '$precioPrd', '$cantidadPrd', '$ivaPrd', '$impPrd' )";

         echo '<pre>';
         var_dump($idPrd);
         echo '</pre>';

        // echo '<pre>';
        // var_dump($nombrePrd);
        // echo '</pre>';

        // echo '<pre>';
        // var_dump($precioPrd);
        // echo '</pre>';

        // echo '<pre>';
        // var_dump($cantidadPrd);
        // echo '</pre>';

        // echo '<pre>';
        // var_dump($ivaPrd);
        // echo '</pre>';

        // echo '<pre>';
        // var_dump($impPrd);
        // echo '</pre>';

        try{
          $resultado = mysqli_query($link,$sql );
          return $resultado;
        } 
        catch( EXCEPTION $e ){
          return FALSE;
        }   
    }

    function agregarCompra( int $i ) : bool
    {
        $link = conectardb();

        $nroCompra = $_POST['nroCompra'];
        $fecha = $_POST['fecha'];
        $proveedor = $_POST['proveedor'];
        $idPrd = mysqli_real_escape_string($link, $_SESSION['idPrd'][$i] );
        $factura = subirArchivo();

        $sql = "INSERT INTO compra 
                (nro_compra, fecha, id_prov, id_prod_compra, factura)
                VALUES
                ('$nroCompra', '$fecha', '$proveedor', '$idPrd', '$factura')";
        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            //echo $e->getMessage(); <- Eso es para mostrarlo en pantalla
            return FALSE;
        }
    }

    function listarCompraProducto()
    {
        $link = conectardb();
        $sql = "SELECT c.nro_compra, pc.id_producto_compra,c.fecha, pc.nombre, pc.precio_unit, pc.cantidad, pc.IVA, pc.Imp_interno, p.razon_social AS PROVEEDOR, p.id_proveedor, c.factura FROM PRODUCTO_COMPRA pc
                    INNER JOIN COMPRA c ON c.id_prod_compra = pc.id_producto_compra
                        INNER JOIN PROVEEDOR p ON p.id_proveedor = c.id_prov";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function verCompraPorId( $id )
    {
        $link = conectardb();
        $sql = "SELECT c.nro_compra, pc.id_producto_compra, c.fecha, pc.nombre, pc.precio_unit, pc.cantidad, p.razon_social AS PROVEEDOR FROM PRODUCTO_COMPRA pc
                    INNER JOIN COMPRA c ON c.id_prod_compra = pc.id_producto_compra
                        INNER JOIN PROVEEDOR p ON p.id_proveedor = c.id_prov
                            WHERE id_producto_compra = '$id'";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function verOrdenCompraPorId( $nro )
    {
        $link = conectardb();
        $sql = "SELECT c.nro_compra, pc.id_producto_compra, c.fecha, pc.nombre, pc.precio_unit, pc.cantidad, p.razon_social AS PROVEEDOR FROM PRODUCTO_COMPRA pc
                    INNER JOIN COMPRA c ON c.id_prod_compra = pc.id_producto_compra
                        INNER JOIN PROVEEDOR p ON p.id_proveedor = c.id_prov
                            WHERE c.nro_compra = '$nro'";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function eliminarCompras( string $idElim ) : bool
    {
        $link = conectardb();

        $sql = "DELETE FROM compra WHERE id_prod_compra = '$idElim'";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function eliminarProductosCompras( string $idElim ) : bool
    {
        $link = conectardb();

        $sql = "DELETE FROM producto_compra WHERE id_producto_compra = '$idElim'";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function modificarCompra( $ids )
    {
        $link = conectardb();

        $nroCompra = mysqli_real_escape_string($link, $_POST['nroCompra'][$ids]);
        $fecha = mysqli_real_escape_string($link, $_POST['fecha'][$ids]);
        $idProdCompra = mysqli_real_escape_string($link, $_POST['idProdCompra'][$ids]);
        $prove = mysqli_real_escape_string($link, $_POST['prove'][$ids]);

        $sql = "UPDATE compra SET nro_compra = '$nroCompra', fecha = '$fecha', id_prov = '$prove' WHERE id_prod_compra = '$idProdCompra'";

        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        }
    }

    function modificarCompraProducto( $ids )
    {
        $link = conectardb();

        $idProdCompra = mysqli_real_escape_string($link, $_POST['idProdCompra'][$ids]);
        $nombre = mysqli_real_escape_string($link, $_POST['nombre'][$ids]);
        $precio_unit = mysqli_real_escape_string($link, $_POST['precioUnit'][$ids]);
        $cantidad = mysqli_real_escape_string($link, $_POST['cantidad'][$ids]);
        $iva = mysqli_real_escape_string($link, $_POST['iva'][$ids]);
        $imp = mysqli_real_escape_string($link, $_POST['imp'][$ids]);

        $sql = "UPDATE producto_compra SET id_producto_compra = '$idProdCompra', nombre = '$nombre', precio_unit = '$precio_unit', cantidad = '$cantidad', IVA = '$iva', Imp_interno = '$imp' WHERE id_producto_compra = '$idProdCompra'";

        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        }
    }

    function modificarFactura() : string
    {
        $link = conectardb();

        $id = $_GET['id'];
        $factura = subirArchivo();
        $sql = "UPDATE compra SET factura = '$factura' WHERE id_prod_compra = '$id'";

        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        }
    }
    
