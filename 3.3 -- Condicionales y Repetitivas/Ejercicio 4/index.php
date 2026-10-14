<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4: Portero Automático</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="contenedor">
    <h2>Interfono de la Comunidad</h2>
    <p>Seleccione el timbre al que desea llamar:</p>

    <table class="tabla-portero">
        <thead>
            <tr>
                <th>Bloque</th>
                <th>Piso</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Bucle exterior: itera los 10 bloques (1 al 10)
            for ($bloque = 1; $bloque <= 10; $bloque++) {
                // Bucle interior: itera los 7 pisos por cada bloque (1 al 7)
                for ($piso = 1; $piso <= 7; $piso++) {
                    echo "<tr>";
                    echo "<td>Bloque {$bloque}</td>";
                    echo "<td>Piso {$piso}</td>";
                    echo "<td>";
                    echo "<a class='btn-llamar' href='llamar.php?bloque={$bloque}&piso={$piso}'>Llamar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>