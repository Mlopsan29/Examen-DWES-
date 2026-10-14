<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Llamada realizada</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// Control de existencia y casteo a enteros
if (isset($_GET['bloque'], $_GET['piso'])) {
    $bloque = (int)$_GET['bloque'];
    $piso   = (int)$_GET['piso'];
    $mensaje = "Usted ha llamado al piso {$piso} del bloque {$bloque}.";
} else {
    $mensaje = "No se ha seleccionado ningún timbre.";
}
?>

<div class="resultado-card">
    <h1>Llamada en curso</h1>
    <div class="datos">
        <p class="valor-final"><?php echo $mensaje; ?></p>
    </div>
    <a class="enlace-volver" href="index.php">&laquo; Volver al interfono</a>
</div>

</body>
</html>