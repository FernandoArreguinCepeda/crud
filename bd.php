<?php
function conectarBD() {

    $host = getenv('DB_HOST') ?: 'db'; 
    $dbname = getenv('DB_NAME') ?: 'itemterraria';
    $user = getenv('DB_USER') ?: 'itemterraria_user';
    $password = getenv('DB_PASSWORD') ?: 'W7eaBZNXymyjgWfj35vb8xawh3aSJ7bD';

    $conn_string = "host=$host port=5432 dbname=$dbname user=$user password=$password";
    
    $conexion = @pg_connect($conn_string); 

    if (!$conexion) {

        exit("Error de conexión a la base de datos. Host: " . $host);
    }
    return $conexion;
}
?>