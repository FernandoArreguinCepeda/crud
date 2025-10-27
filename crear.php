<?php
include '../bd.php';
$item = []; 
$accion = 'Crear'; 
$id = 0; 

$conexion = conectarBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $tipo = trim($_POST['tipo']);
    $rareza = (int)$_POST['rareza'];
    $dano = (int)$_POST['dano'];
    $descripcion = trim($_POST['descripcion']);
    $valor_venta = (float)$_POST['valor_venta'];
    
    $query = "INSERT INTO items_terraria (nombre, tipo, rareza, dano, descripcion, valor_venta) 
              VALUES ($1, $2, $3, $4, $5, $6)";
    $datos = array($nombre, $tipo, $rareza, $dano, $descripcion, $valor_venta);

    if (seleccionar($conexion, $query, $datos)) {
        pg_close($conexion);
        header("Location: ../index.php?msg=ok"); 
        exit;
    } else {
        pg_close($conexion);
        header("Location: ../index.php?msg=err");
        exit;
    }
}

pg_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $accion; ?> Item</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4"><?php echo $accion; ?> Item</h1>
        <a href="../index.php" class="btn btn-secondary mb-3">← Volver</a>
        
        <form action="crear.php" method="POST">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required
                           value="<?php echo htmlspecialchars($item['nombre'] ?? ''); ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" required
                           value="<?php echo htmlspecialchars($item['tipo'] ?? ''); ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="rareza" class="form-label">Rareza (0-11)</label>
                    <input type="number" class="form-control" id="rareza" name="rareza" required min="0" max="11"
                           value="<?php echo htmlspecialchars($item['rareza'] ?? '0'); ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="dano" class="form-label">Daño</label>
                    <input type="number" class="form-control" id="dano" name="dano" min="0"
                           value="<?php echo htmlspecialchars($item['dano'] ?? '0'); ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="valor_venta" class="form-label">Valor Venta</label>
                <input type="number" class="form-control" id="valor_venta" name="valor_venta" step="0.01" min="0"
                       value="<?php echo htmlspecialchars($item['valor_venta'] ?? '0.00'); ?>">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">
                    <?php echo htmlspecialchars($item['descripcion'] ?? ''); ?>
                </textarea>
            </div>
            
            <button type="submit" class="btn btn-primary"><?php echo $accion; ?> Item</button>
        </form>
    </div>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
</body>
</html>