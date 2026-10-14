<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la Primitiva</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// 1. Recoger números seleccionados por el usuario
$elegidos = isset($_POST['numeros']) ? $_POST['numeros'] : [];
$total_elegidos = count($elegidos);
$serie_usuario  = isset($_POST['serie']) ? (int)$_POST['serie'] : 0;

// 2. Generar combinación ganadora de 6 números no repetidos mediante bucle
$ganadores = [];
while (count($ganadores) < 6) {
    $num_aleatorio = rand(1, 49);
    if (!in_array($num_aleatorio, $ganadores)) {
        $ganadores[] = $num_aleatorio;
    }
}
$serie_ganadora = rand(1, 999);

// 3. Comprobar si ha hecho trampas (más de 6 números)
$es_tramposo = ($total_elegidos > 6);

// 4. Calcular aciertos
$aciertos = 0;
if (!$es_tramposo) {
    for ($i = 0; $i < $total_elegidos; $i++) {
        if (in_array((int)$elegidos[$i], $ganadores)) {
            $aciertos++;
        }
    }
}

// 5. Determinar premio
$acierto_serie = ($serie_usuario === $serie_ganadora);
$premio_texto = "Nada (0 €)";

if ($es_tramposo) {
    $premio_texto = "<span class='alerta-trampa'>¡HAS HECHO TRAMPAS! Has seleccionado más de 6 números.</span>";
} else {
    if ($aciertos == 4) {
        $premio_texto = "Dinero vuelto";
    } elseif ($aciertos == 5) {
        $premio_texto = "30 €";
    } elseif ($aciertos == 6) {
        $premio_texto = "100 €";
    }

    if ($acierto_serie) {
        if ($aciertos < 4) {
            $premio_texto = "500 € (Premio por serie)";
        } else {
            $premio_texto .= " + 500 € (por acertar la serie)";
        }
    }
}
?>

<div class="resultado-card">
    <h1>Resultado del Boleto</h1>

    <!-- Leyenda de colores -->
    <div class="leyenda">
        <span><span class="muestra c-verde"></span> Acierto</span>
        <span><span class="muestra c-negro"></span> Elegido fallado</span>
        <span><span class="muestra c-rojo"></span> Ganador no elegido</span>
        <span><span class="muestra c-gris"></span> No jugado</span>
    </div>

    <!-- Tablero completo de 1 al 49 generado con bucles -->
    <table class="tabla-mosaico-resultado">
        <tbody>
            <?php
            $numero_actual = 1;
            // 7 filas x 7 columnas = 49 casillas
            for ($f = 0; $f < 7; $f++) {
                echo "<tr>";
                for ($c = 0; $c < 7; $c++) {
                    $es_elegido = in_array((string)$numero_actual, $elegidos);
                    $es_ganador = in_array($numero_actual, $ganadores);

                    // Determinación del color según el enunciado
                    if ($es_elegido && $es_ganador) {
                        $clase_color = "c-verde"; // Acierto
                    } elseif ($es_elegido && !$es_ganador) {
                        $clase_color = "c-negro"; // Fallado por el usuario
                    } elseif (!$es_elegido && $es_ganador) {
                        $clase_color = "c-rojo";  // Ganador no marcado
                    } else {
                        $clase_color = "c-gris";  // Resto
                    }

                    echo "<td class='{$clase_color}'>{$numero_actual}</td>";
                    $numero_actual++;
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="datos">
        <p><strong>Números seleccionados:</strong> <?php echo $total_elegidos; ?></p>
        <?php if (!$es_tramposo): ?>
            <p><strong>Aciertos conseguidos:</strong> <?php echo $aciertos; ?> de 6</p>
            <p><strong>Serie usuario:</strong> <?php echo $serie_usuario; ?> | <strong>Serie ganadora:</strong> <?php echo $serie_ganadora; ?></p>
        <?php endif; ?>
        <p class="valor-final">Premio: <?php echo $premio_texto; ?></p>
    </div>

    <a class="enlace-volver" href="index.php">&laquo; Volver a jugar</a>
</div>

</body>
</html>