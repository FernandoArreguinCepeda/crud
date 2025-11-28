<?php
function conectarBD() {

    $host = getenv('DB_HOST') ?: 'db'; 
    $dbname = getenv('DB_NAME') ?: 'ItemTerraria';
    $user = getenv('DB_USER') ?: 'postgres';
    $password = getenv('DB_PASSWORD') ?: '9894';

    $conn_string = "host=$host port=5432 dbname=$dbname user=$user password=$password";
    

    $conexion = @pg_connect($conn_string); 

    if (!$conexion) {
        exit("Error de conexión: " . pg_last_error());
    }
    return $conexion;
}
function seleccionar($conexion, $query, $datos) {
    return pg_query_params($conexion, $query, $datos);
}
?>
