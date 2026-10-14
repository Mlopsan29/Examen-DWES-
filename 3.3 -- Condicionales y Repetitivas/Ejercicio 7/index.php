<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2: Lotería Primitiva con Bucles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="contenedor-boleto">
    <h2>Lotería Primitiva</h2>
    <p>Selecciona tus 6 números de la suerte (1 al 49):</p>

    <form action="sorteo.php" method="post">
        <div class="rejilla-bingo">
            <?php
            // Generamos las 49 casillas de forma limpia mediante un bucle
            for ($i = 1; $i <= 49; $i++) {
                echo "<label class='casilla-num'>";
                echo "<input type='checkbox' name='numeros[]' value='{$i}'> {$i}";
                echo "</label>";
            }
            ?>
        </div>

        <div class="campo-serie">
            <label for="serie">Número de Serie (1 al 999):</label>
            <input type="number" id="serie" name="serie" min="1" max="999" required placeholder="Ej: 345">
        </div>

        <input type="submit" value="Jugar">
    </form>
</div>

</body>
</html>