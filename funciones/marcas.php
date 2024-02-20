<?php

    /*########
        CRUD de marcas
    */########

    function listarMarcas(): mysqli_result
    {
        $link = conectardb();
        $sql = "SELECT * FROM marca";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function agregarMarcas()
    {
        $nombre = $_POST['nombreMk'];
        $link = conectardb();
        $sql = "INSERT INTO marca (nombre_marca) VALUES ('$nombre')";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function eliminarMarcas( int $idElim ) : bool
    {
        $link = conectardb();

        $sql = "DELETE FROM marca WHERE id_marca = $idElim";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }

    function verMarcaPorId( int $id ) 
    {

        $link = conectardb();

        $sql = "SELECT * FROM marca WHERE id_marca = $id";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;

    }