<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5: Matriz de Ojos 10x10</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// Recogemos la coordenada seleccionada mediante GET.
// Si es la primera carga (no se ha pulsado nada), asignamos valores nulos.
$fila_activa = isset($_GET['fila']) ? (int)$_GET['fila'] : -1;
$col_activa  = isset($_GET['col'])  ? (int)$_GET['col']  : -1;
?>

<div class="contenedor-matriz">
    <h2>Tablero de Ojos (10x10)</h2>
    <p>Haz clic en cualquier ojo para abrirlo:</p>

    <table class="tabla-ojos">
        <tbody>
            <?php
            // Bucle exterior: controla las 10 filas (0 a 9)
            for ($f = 0; $f < 10; $f++) {
                echo "<tr>";
                // Bucle interior: controla las 10 columnas (0 a 9)
                for ($c = 0; $c < 10; $c++) {
                    // Comprobamos si esta celda coincide con la pulsada
                    $esta_abierto = ($f === $fila_activa && $c === $col_activa);

                    // Ruta de la imagen correspondiente (o emoji/icono)
                    $imagen = $esta_abierto ? "images/abierto.jpg" : "images/cerrado.jpg";
                    $alt    = $esta_abierto ? "Ojo abierto" : "Ojo cerrado";

                    echo "<td>";
                    // Enlace que recarga la página enviando las coordenadas actuales
                    echo "<a href='index.php?fila={$f}&col={$c}' title='Fila {$f}, Columna {$c}'>";
                    echo "<img src='{$imagen}' alt='{$alt}' class='icono-ojo'>";
                    echo "</a>";
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <?php if ($fila_activa !== -1): ?>
        <p class="coordenadas-info">
            Ojo abierto en la coordenada: <strong>Fila <?php echo $fila_activa + 1; ?>, Columna <?php echo $col_activa + 1; ?></strong>
        </p>
        <a class="enlace-reiniciar" href="index.php">Cerrar todos los ojos</a>
    <?php endif; ?>
</div>

</body>
</html>