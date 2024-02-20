<?php

    /*########
        CRUD de proveedores
    */########

    function listarProveedores(): mysqli_result
    {
        $link = conectardb();
        $sql = "SELECT id_proveedor, razon_social, direccion, telefono_asist FROM proveedor";
        $resultado = mysqli_query( $link,$sql );
        return $resultado;
    }