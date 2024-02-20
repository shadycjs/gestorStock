<?php

    /*########
        CRUD de clientes
    */########

    function listarClientes() : mysqli_result
    {
        $link = conectardb();

        $sql = "SELECT * FROM cliente";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function ordenarClientes()
    {
        $link = conectardb();
        $tipoOrdenamiento = $_POST['ordenar'];
    
    
        if($tipoOrdenamiento == 2){
            $sql = "SELECT * FROM cliente ORDER BY provincia";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 3) {
            $sql = "SELECT * FROM cliente ORDER BY nombre_razon";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }else {
            $sql = "SELECT * FROM cliente";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
    }
    
    function buscadorClientes()
    {
        $link = conectardb();
        $busqueda = $_GET['buscador'];
        $sql = "SELECT * FROM cliente WHERE nombre_razon LIKE '%$busqueda%' OR provincia LIKE '%$busqueda%' OR codigo_postal LIKE '%$busqueda%' OR id_cliente LIKE '%$busqueda%' 
                    OR ciudad LIKE '%$busqueda%' OR calle LIKE '%$busqueda%'";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function ordenarClientesBuscador()
    {
        $link = conectardb();
        $tipoOrdenamiento = $_POST['ordenar'];
        $busqueda = $_GET['buscador'];
    
    
        if($tipoOrdenamiento == 2){
            $sql = "SELECT * FROM cliente WHERE nombre_razon LIKE '%$busqueda%' OR provincia LIKE '%$busqueda%' OR codigo_postal LIKE '%$busqueda%' OR id_cliente LIKE '%$busqueda%' 
                        OR ciudad LIKE '%$busqueda%' OR calle LIKE '%$busqueda%'
                            ORDER BY provincia";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        } elseif($tipoOrdenamiento == 3) {
            $sql = "SELECT * FROM cliente WHERE nombre_razon LIKE '%$busqueda%' OR provincia LIKE '%$busqueda%' OR codigo_postal LIKE '%$busqueda%' OR id_cliente LIKE '%$busqueda%' 
                        OR ciudad LIKE '%$busqueda%' OR calle LIKE '%$busqueda%'
                            ORDER BY nombre_razon";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }else {
            $sql = "SELECT * FROM cliente WHERE nombre_razon LIKE '%$busqueda%' OR provincia LIKE '%$busqueda%' OR codigo_postal LIKE '%$busqueda%' OR id_cliente LIKE '%$busqueda%' 
                        OR ciudad LIKE '%$busqueda%' OR calle LIKE '%$busqueda%'";
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
    }

    function agregarCliente()
    {
        $link = conectardb();
        
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
        $provincia = $_POST['provincia'];
        $ciudad = $_POST['ciudad'];
        $calle = $_POST['calle'];
        $postal = $_POST['postal'];
        
        $sql = "INSERT INTO cliente 
                (nombre_razon, cuit_dni, telefono, email, provincia, ciudad, calle, codigo_postal, factura)
                VALUES
                ('$nombre', '$dni', '$tel', '$mail', '$provincia', '$ciudad', '$calle', $postal, DEFAULT)";
        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        }   
    }

    function eliminarCliente( int $idElim )
    {
        $link = conectardb();
        
        $sql = "DELETE FROM cliente WHERE id_cliente = ". $idElim;
        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        }    
    }

    function modificarCliente( int $ids )
    {
        $link = conectardb();

        $idCliente = mysqli_real_escape_string($link, $_POST['id'][$ids]);
        $nombre = mysqli_real_escape_string($link, $_POST['nombre'][$ids]);
        $dni = mysqli_real_escape_string($link, $_POST['dni'][$ids]);
        $tel = mysqli_real_escape_string($link, $_POST['tel'][$ids]);
        $mail = mysqli_real_escape_string($link, $_POST['mail'][$ids]);
        $provincia = mysqli_real_escape_string($link, $_POST['provincia'][$ids]);
        $ciudad = mysqli_real_escape_string($link, $_POST['ciudad'][$ids]);
        $calle = mysqli_real_escape_string($link, $_POST['calle'][$ids]);
        $postal = mysqli_real_escape_string($link, $_POST['postal'][$ids]);
        $factura = mysqli_real_escape_string($link, $_POST['factura'][$ids]);

        $sql = "UPDATE cliente SET nombre_razon = '$nombre', cuit_dni = '$dni',
                    telefono = '$tel', email = '$mail', provincia = '$provincia',
                    ciudad = '$ciudad', calle = '$calle', codigo_postal = $postal,
                    factura = '$factura' WHERE id_cliente = ".$idCliente;
        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        }    
    }

    function verClientePorId( $id )
    {
        $link = conectardb();

        $sql = "SELECT * FROM cliente WHERE id_cliente = '$id'";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function modificarNombreCliente( $id )
    {
        $link = conectardb();

        $idCliente = mysqli_real_escape_string($link, $_POST['idcli'][$id]);
        $nombreCli = mysqli_real_escape_string($link, $_POST['nombreCli'][$id]);
        $sql = "UPDATE cliente SET nombre_razon = '$nombreCli' WHERE id_cliente = ".$idCliente;
        try{
            $resultado = mysqli_query( $link,$sql );
            return $resultado;
        }
        catch( EXCEPTION $e ){
            $e->getMessage(); 
            return FALSE;
        }   
    }
    