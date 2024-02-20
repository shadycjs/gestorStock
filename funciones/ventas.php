<?php

    /*########
        CRUD de ventas
    */########

    function listarVentas() : mysqli_result
    {
        $link = conectardb();

        $sql = "SELECT v.id_venta, v.nombre_producto, v.precio, v.cantidad, v.medio_venta, v.forma_pago, v.factura, c.nombre_razon, c.id_cliente,v.fecha FROM venta v
                    INNER JOIN cliente c ON c.id_cliente = v.id_cliente;";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function subirArchivo() : string
    {
        $factura = 'SIN EMITIR';
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
        $sql = "SELECT * FROM venta WHERE id_venta = '$id'";
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
    

    function agregarVenta()
    {
        $link = conectardb();

        $nombreProducto = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $medio = $_POST['medio'];
        $forma = $_POST['forma'];
        $factura = subirArchivo();
        $clienteID = $_POST['cliente'];
        $fecha = $_POST['fecha'];

        $sql = "INSERT INTO venta 
                (nombre_producto, precio, cantidad, medio_venta, forma_pago, factura, id_cliente, fecha)
                VALUES
                ('$nombreProducto', $precio, $cantidad, '$medio', '$forma', '$factura', $clienteID, '$fecha')";

        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado; 
        }
        catch( EXCEPTION $e ){
            return FALSE;
          }   
    }

    function modificarFactura() : string
    {
        $link = conectardb();

        $id = $_GET['id'];
        $factura = subirArchivo();
        $sql = "UPDATE venta SET factura = '$factura' WHERE id_venta = '$id'";

        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        }
    }

    function actualizarFacturaCliente()
    {
        $link = conectardb();

        $clienteID = $_POST['cliente'];
        $factura = $_POST['tipofac'];
        $sql = "UPDATE cliente SET factura = '$factura' WHERE id_cliente = '$clienteID'";

        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        } 
    }

    function eliminarVenta( $idElim )
    {
        $link = conectardb();
        
        $sql = "DELETE FROM venta WHERE id_cliente = ". $idElim." OR id_venta = ".$idElim ;
        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        }    
    }
    
    function verVentaPorId( $id )
    {
        $link = conectardb();
        $sql = "SELECT v.id_venta, v.nombre_producto, v.precio, v.cantidad, v.medio_venta, v.forma_pago, v.factura, c.nombre_razon, v.fecha FROM venta v
                    INNER JOIN cliente c ON c.id_cliente = v.id_cliente
                        WHERE v.id_venta = ".$id;
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function modificarArchivo() : string
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

    function modificarVenta( $ids )
    {
        $link = conectardb();

        $idVenta = mysqli_real_escape_string($link, $_POST['id'][$ids]);
        $nombrePrd = mysqli_real_escape_string($link, $_POST['nombrePrd'][$ids]);
        $precio = mysqli_real_escape_string($link, $_POST['precio'][$ids]);
        $cantidad = mysqli_real_escape_string($link, $_POST['cant'][$ids]);
        $medio = mysqli_real_escape_string($link, $_POST['medio'][$ids]);
        $forma = mysqli_real_escape_string($link, $_POST['forma'][$ids]);
        $fecha = mysqli_real_escape_string($link, $_POST['fecha'][$ids]);

        $sql = "UPDATE venta SET id_venta = $idVenta, nombre_producto = '$nombrePrd', precio = $precio, cantidad = $cantidad,
                medio_venta = '$medio', forma_pago = '$forma' , fecha = '$fecha'
                    WHERE id_venta = ".$idVenta;

        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        }
    }


