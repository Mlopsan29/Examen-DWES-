<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Sorteo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// 1. Generación de los 6 números aleatorios ganadores (sin arrays)
$g1 = rand(1, 49);
$g2 = rand(1, 49);
$g3 = rand(1, 49);
$g4 = rand(1, 49);
$g5 = rand(1, 49);
$g6 = rand(1, 49);

// Número de serie ganador
$serie_ganadora = rand(1, 999);
$serie_usuario  = isset($_POST['serie']) ? (int)$_POST['serie'] : 0;

// 2. Comprobación de aciertos (sin bucles ni arrays)
// Se verifica si el usuario marcó el checkbox correspondiente al número premiado
$aciertos = 0;

if (isset($_POST['num' . $g1])) { $aciertos++; }
if (isset($_POST['num' . $g2])) { $aciertos++; }
if (isset($_POST['num' . $g3])) { $aciertos++; }
if (isset($_POST['num' . $g4])) { $aciertos++; }
if (isset($_POST['num' . $g5])) { $aciertos++; }
if (isset($_POST['num' . $g6])) { $aciertos++; }

// 3. Acierto de serie
$acierto_serie = ($serie_usuario === $serie_ganadora);

// 4. Determinación del premio según las reglas
$premio_texto = "Nada (0 €)";

if ($aciertos == 4) {
    $premio_texto = "Dinero vuelto";
} elseif ($aciertos == 5) {
    $premio_texto = "30 €";
} elseif ($aciertos == 6) {
    $premio_texto = "100 €";
}

// Sumar premio de la serie si se acertó
if ($acierto_serie) {
    if ($aciertos < 4) {
        $premio_texto = "500 € (Premio especial por serie)";
    } else {
        $premio_texto .= " + 500 € (por acertar la serie)";
    }
}
?>

<div class="resultado-card">
    <h1>Resultado del Sorteo</h1>

    <!-- Combinación ganadora en tabla con 1 fila y 6 columnas -->
    <table class="tabla-primitiva">
        <thead>
            <tr>
                <th colspan="6">Combinación Ganadora</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $g1; ?></td>
                <td><?php echo $g2; ?></td>
                <td><?php echo $g3; ?></td>
                <td><?php echo $g4; ?></td>
                <td><?php echo $g5; ?></td>
                <td><?php echo $g6; ?></td>
            </tr>
        </tbody>
    </table>

    <div class="datos">
        <p><strong>Tu número de serie:</strong> <?php echo $serie_usuario; ?> | <strong>Serie ganadora:</strong> <?php echo $serie_ganadora; ?></p>
        <p><strong>Aciertos de la combinación:</strong> <?php echo $aciertos; ?> de 6</p>
        <p class="valor-final">Premio obtenido: <?php echo $premio_texto; ?></p>
    </div>

    <a class="enlace-volver" href="index.html">&laquo; Volver a jugar</a>
</div>

</body>
</html>