<?php
function conectarBD() {
    $conexion = pg_connect("host=localhost port=5432 dbname=ItemTerraria user=postgres password=9894");
    if (!$conexion) {
        exit("Error de conexión: " . pg_last_error());
    }
    return $conexion;
}
function seleccionar($conexion, $query, $datos) {
    return pg_query_params($conexion, $query, $datos);
}