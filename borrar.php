<?php
include 'bd.php'; 

$id = (int)($_GET['id'] ?? 0); 

if ($id > 0) {
    $conexion = conectarBD();

    $query = "DELETE FROM items_terraria WHERE id = $1";
    $datos = array($id);

    $resultado = seleccionar($conexion, $query, $datos); 

    if ($resultado !== false) { 

        if (pg_affected_rows($resultado) > 0) {
            $msg = 'ok'; 
        } else {
            $msg = 'err';
        }
    } else {
        $msg = 'err';
    }

    pg_close($conexion);
} else {
    $msg = 'err';
}

header("Location: index.php?msg=$msg");
exit;
?>