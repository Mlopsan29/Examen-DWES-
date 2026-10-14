<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio Primitiva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .error {
            color: red;
        }
        .acierto {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Lotería Primitiva</h2>

    <form action="" method="post">
        <p>Introduce tus 6 números (del 1 al 49):</p>
        <input type="number" name="n1" min="1" max="49" required style="width: 50px;">
        <input type="number" name="n2" min="1" max="49" required style="width: 50px;">
        <input type="number" name="n3" min="1" max="49" required style="width: 50px;">
        <input type="number" name="n4" min="1" max="49" required style="width: 50px;">
        <input type="number" name="n5" min="1" max="49" required style="width: 50px;">
        <input type="number" name="n6" min="1" max="49" required style="width: 50px;">

        <p>Número de serie (1 al 999):</p>
        <input type="number" name="serie" min="1" max="999" required style="width: 70px;">
        <br><br>

        <input type="submit" name="enviar" value="Comprobar boleto">
    </form>

    <hr>

    <?php
    if (isset($_POST['enviar'])) {
        // Guardamos los números en un array
        $mis_numeros = array(
            $_POST['n1'],
            $_POST['n2'],
            $_POST['n3'],
            $_POST['n4'],
            $_POST['n5'],
            $_POST['n6']
        );
        $mi_serie = $_POST['serie'];

        // Comprobamos si hay números repetidos
        $hay_repetidos = false;
        for ($i = 0; $i < count($mis_numeros); $i++) {
            for ($j = $i + 1; $j < count($mis_numeros); $j++) {
                if ($mis_numeros[$i] == $mis_numeros[$j]) {
                    $hay_repetidos = true;
                }
            }
        }

        if ($hay_repetidos) {
            echo "<p class='error'>Error: Has puesto números repetidos.</p>";
        } else {
            // Generar los 6 números ganadores sin repetir con un while típico
            $ganadores = array();
            while (count($ganadores) < 6) {
                $num_aleatorio = rand(1, 49);
                if (!in_array($num_aleatorio, $ganadores)) {
                    $ganadores[] = $num_aleatorio;
                }
            }

            // Serie ganadora
            $serie_ganadora = rand(1, 999);

            // Contar aciertos
            $aciertos = 0;
            for ($i = 0; $i < 6; $i++) {
                if (in_array($mis_numeros[$i], $ganadores)) {
                    $aciertos++;
                }
            }

            // Mostrar resultados
            echo "<h3>Resultados:</h3>";

            echo "<p>Tu combinación: ";
            for ($i = 0; $i < 6; $i++) {
                echo $mis_numeros[$i] . " ";
            }
            echo "</p>";

            echo "<p>Combinación ganadora: ";
            for ($i = 0; $i < 6; $i++) {
                echo $ganadores[$i] . " ";
            }
            echo "</p>";

            echo "<p>Aciertos en la combinación: <strong>" . $aciertos . "</strong></p>";

            echo "<p>Tu serie: " . $mi_serie . " | Serie ganadora: " . $serie_ganadora . "</p>";

            if ($mi_serie == $serie_ganadora) {
                echo "<p class='acierto'>¡Has acertado también la serie!</p>";
            } else {
                echo "<p>No has acertado la serie.</p>";
            }
        }
    }
    ?>

</body>
</html>
