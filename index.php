<?php
include 'bd.php';
$conexion = conectarBD();

$query = "SELECT id, nombre, tipo, rareza, dano, valor_venta FROM items_terraria ORDER BY id DESC";
$resultado = seleccionar($conexion, $query, array());

$mensaje = '';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'ok') $mensaje = '<div class="alert alert-success">Operación realizada con éxito.</div>';
    if ($_GET['msg'] == 'err') $mensaje = '<div class="alert alert-danger">Error en la operación.</div>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Terraria</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Items de Terraria</h1>
        
        <a href="crear_y_editar.php" class="btn btn-success mb-3">
            Agregar Nuevo Item
        </a>

        <?php echo $mensaje; ?>

        <?php if (pg_num_rows($resultado) > 0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Rareza</th>
                            <th>Daño</th>
                            <th>Valor Venta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = pg_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><?php echo $fila['id']; ?></td>
                            <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($fila['tipo']); ?></td>
                            <td><?php echo $fila['rareza']; ?></td>
                            <td><?php echo $fila['dano']; ?></td>
                            <td>$<?php echo $fila['valor_venta']; ?></td>
                            <td>
                                <a href="crear_y_editar.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
                                <a href="borrar.php?id=<?php echo $fila['id']; ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('¿Confirma la eliminación?');">Borrar</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">No hay items registrados.</div>
        <?php endif; ?>
    </div>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php pg_close($conexion); ?>