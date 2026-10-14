<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Precios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (isset($_POST['tienda1']) && isset($_POST['tienda2']) && isset($_POST['tienda3'])) {
    $t1 = (float)$_POST['tienda1'];
    $t2 = (float)$_POST['tienda2'];
    $t3 = (float)$_POST['tienda3'];

    // Cálculo de la media aritmética
    $media = ($t1 + $t2 + $t3) / 3;
    $media_redondeada = round($media, 2);

    // Diferencias respecto a la media
    $dif1 = round($t1 - $media, 2);
    $dif2 = round($t2 - $media, 2);
    $dif3 = round($t3 - $media, 2);
} else {
    $t1 = $t2 = $t3 = 0;
    $media_redondeada = 0;
    $dif1 = $dif2 = $dif3 = 0;
}
?>

<div class="resultado-card">
    <h1>Comparativa y Precio Medio</h1>

    <table class="tabla-precios">
        <thead>
            <tr>
                <th colspan="3">Resumen de Precios por Establecimiento</th>
            </tr>
            <tr>
                <th>Establecimiento</th>
                <th>Precio</th>
                <th>Diferencia con la Media</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tienda 1</td>
                <td><?php echo number_format($t1, 2); ?> €</td>
                <td><?php echo ($dif1 > 0 ? "+$dif1" : $dif1); ?> €</td>
            </tr>
            <tr>
                <td>Tienda 2</td>
                <td><?php echo number_format($t2, 2); ?> €</td>
                <td><?php echo ($dif2 > 0 ? "+$dif2" : $dif2); ?> €</td>
            </tr>
            <tr>
                <td>Tienda 3</td>
                <td><?php echo number_format($t3, 2); ?> €</td>
                <td><?php echo ($dif3 > 0 ? "+$dif3" : $dif3); ?> €</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Precio Medio</th>
                <td colspan="2" class="valor-final"><?php echo number_format($media_redondeada, 2); ?> €</td>
            </tr>
        </tfoot>
    </table>

    <a class="enlace-volver" href="index.html">&laquo; Volver a calcular</a>
</div>

</body>
</html>