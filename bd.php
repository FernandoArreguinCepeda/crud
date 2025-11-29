<?php
// LA FUNCIÓN CONECTARBD ES OBLIGATORIA
function conectarBD() {

    $host = getenv('DB_HOST') ?: 'dpg-d4l3ad7pm1nc738jacc0-a'; 
    $dbname = getenv('DB_NAME') ?: 'itemterraria'; 
    $user = getenv('DB_USER') ?: 'itemterraria_user'; 
    $password = getenv('DB_PASSWORD') ?: 'W7eaBZNXymyjgWfj35vb8xawh3aSJ7bD'; 
    $conn_string = "host=$host port=5432 dbname=$dbname user=$user password=$password";
    
    // Intenta conectar
    $conexion = @pg_connect($conn_string); 

    if (!$conexion) {

        die("Error de conexión a la base de datos. Host: " . $host . ". Verifica las 4 variables de entorno en Render.");
    }
    return $conexion;
}


function seleccionar($conexion, $query, $datos) {
    return pg_query_params($conexion, $query, $datos);
}
?>