<?php

    const SERVER = 'localhost';
    const USUARIO = 'root';
    const CLAVE = '';
    const BASE = 'rc_computers';

    function conectardb() : mysqli
    {
        $link = mysqli_connect(
            SERVER,
            USUARIO,
            CLAVE,
            BASE
        );
        return $link;
    }