<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Juego</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$palabra_secreta = "perro";

$acierto = false;
$intento = "";

if (isset($_POST['respuesta'])) {
    $intento = trim($_POST['respuesta']);

    if (strtolower($intento) === strtolower($palabra_secreta)) {
        $acierto = true;
    }
}
?>

<div class="resultado-card">
    <?php if ($acierto): ?>
        <h1 class="texto-acierto">¡Enhorabuena, has acertado!</h1>
        <p>Efectivamente, la imagen era: <strong><?php echo htmlspecialchars($palabra_secreta); ?></strong></p>
        <div class="imagen-completa">
            <img src="images/secreto.jpg" alt="Imagen resuelta">
        </div>
        <a class="enlace-volver" href="index.php">&laquo; Jugar otra vez</a>

    <?php else: ?>
        <h1 class="texto-fallo">¡Has fallado!</h1>
        <p>Tu intento "<em><?php echo htmlspecialchars($intento); ?></em>" no es correcto.</p>
        <a class="enlace-volver" href="index.php">&laquo; Volver a intentarlo</a>
    <?php endif; ?>
</div>

</body>
</html>