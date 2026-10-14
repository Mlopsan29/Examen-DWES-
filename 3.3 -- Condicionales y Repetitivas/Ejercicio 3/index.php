<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego: Adivina la Imagen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="contenedor-juego">
    <h2>¿Qué hay en la imagen?</h2>
    <p>Haz clic en cualquier casilla para verla durante 2 segundos:</p>

    <!-- Cuadrícula 3x3 -->
    <div class="tablero">
        <div class="casilla tapada pos-0" onclick="destapar(this)"></div>
        <div class="casilla tapada pos-1" onclick="destapar(this)"></div>
        <div class="casilla tapada pos-2" onclick="destapar(this)"></div>
        <div class="casilla tapada pos-3" onclick="destapar(this)"></div>
        <div class="casilla tapada pos-4" onclick="destapar(this)"></div>
        <div class="casilla tapada pos-5" onclick="destapar(this)"></div>
        <div class="casilla tapada pos-6" onclick="destapar(this)"></div>
        <div class="casilla tapada pos-7" onclick="destapar(this)"></div>
        <div class="casilla tapada pos-8" onclick="destapar(this)"></div>
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
    // Si ya está visible, no hacemos nada
    if (!elemento.classList.contains('tapada')) return;

    // Quitamos la capa tapada para revelar la imagen
    elemento.classList.remove('tapada');

    // A los 2000 milisegundos (2 segundos), la volvemos a tapar
    setTimeout(function() {
        elemento.classList.add('tapada');
    }, 2000);
}
</script>

</body>
</html>