<?php


    $host = getenv('DB_HOST') ?: 'dpg-d4l3ad7pm1nc738jacc0-a'; 
    $dbname = getenv('DB_NAME') ?: 'itemterraria';
    $user = getenv('DB_USER') ?: 'itemterraria_user';
    $password = getenv('DB_PASSWORD') ?: 'W7eaBZNXymyjgWfj35vb8xawh3aSJ7bD';

$conn_string = "host=$host port=5432 dbname=$dbname user=$user password=$password";
$conexion = pg_connect($conn_string); 
if (!$conexion) {
    die("Error de conexión con la base de datos: " . pg_last_error());
}
?>