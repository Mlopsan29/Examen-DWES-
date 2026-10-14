<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego Mosaico 3x3 - Con Bucles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="contenedor-juego">
    <h2>¿Qué hay en la imagen?</h2>
    <p>Haz clic en cualquier casilla para verla durante 2 segundos:</p>

    <!-- Tablero 3x3 generado dinámicamente con un bucle -->
    <div class="tablero">
        <?php
        // Generamos las 9 casillas (0 a 8) mediante un bucle for
        for ($i = 0; $i < 9; $i++) {
            // Columna (0, 1 o 2) y Fila (0, 1 o 2)
            $col  = $i % 3;
            $fila = floor($i / 3);

            // Desplazamiento del fondo (100px por casilla)
            $posX = $col * -100;
            $posY = $fila * -100;

            echo "<div class='casilla tapada' style='background-position: {$posX}px {$posY}px;' onclick='destapar(this)'></div>";
        }
        ?>
    </div>

    <!-- Formulario para adivinar -->
    <form action="comprobar.php" method="post" class="form-adivinar">
        <label for="respuesta">Introduce tu respuesta:</label>
        <input type="text" id="respuesta" name="respuesta" required placeholder="Ej: perro" autocomplete="off">
        <input type="submit" value="Comprobar">
    </form>
</div>

<script>
function destapar(elemento) {
    if (!elemento.classList.contains('tapada')) return;

    elemento.classList.remove('tapada');

    setTimeout(function() {
        elemento.classList.add('tapada');
    }, 2000);
}
</script>

</body>
</html>