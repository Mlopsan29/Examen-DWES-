<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Llenado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (isset($_POST['diametro'], $_POST['altura'], $_POST['caudal'])) {
    $diametro = (float)$_POST['diametro'];
    $altura   = (float)$_POST['altura'];
    $caudal   = (float)$_POST['caudal'];

    // 1. Radio y volumen en m3
    $radio = $diametro / 2;
    $volumen_m3 = M_PI * ($radio ** 2) * $altura;

    // 2. Pasar m3 a litros (1 m3 = 1000 litros)
    $litros = $volumen_m3 * 1000;

    // 3. Minutos totales
    $minutos_totales = round($litros / $caudal);

    // 4. Horas y minutos sobrantes
    $horas = floor($minutos_totales / 60);
    $minutos = $minutos_totales % 60;
} else {
    $horas = 0;
    $minutos = 0;
}
?>

<div class="resultado-card">
    <h1>Tiempo Estimado de Llenado</h1>
    <div class="datos">
        <p><strong>Capacidad aproximada:</strong> <?php echo round($litros, 2); ?> litros</p>
        <p class="valor-final">
            Tiempo total: <?php echo $horas; ?> horas y <?php echo $minutos; ?> minutos
        </p>
    </div>
    <a class="enlace-volver" href="index.html">&laquo; Calcular otro depósito</a>
</div>

</body>
</html>