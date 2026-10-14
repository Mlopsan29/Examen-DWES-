<?php
//Ejercicio 4
//Escribe un programa que muestre tu horario de clase mediante una tabla. Aunque se puede hacer
//íntegramente en HTML (igual que los ejercicios anteriores), ve intercalando código HTML y PHP para
//familiarizarte con éste último.

$dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];
$horario = [
    "08:15 - 09:15" => ["DWEC", "PRO", "ENG", "DWES", "DWEC"],
    "09:15 - 10:15" => ["DWEC", "PRO", "DWES", "DWES", "DWEC"],
    "10:15 - 10:45" => ["DWEC","OPT","DWES","DWES","DWEC"],
    "11;45 - 12:45" => ["ENG", "OPT", "WID", "WID", "WID"],
    "12:450 - 13:45" => ["DWES", "DESP", "IPE2", "WID", "WID"],
    "13:45 - 14:45" => ["DWES", "DESP", "IPE2", "IPE2", "OPT"]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Diccionario</title>
</head>
<body>

<h2> Horario de clases </h2>

<table border="1">
<tr>
    <?php foreach ($dias as $dia): ?>
        <th> <?= $dia ?></th>
        <?php endforeach; ?>
</tr>

<?php foreach ($horario as $tramo): ?>
    <tr>
        <?php foreach ($tramo as $asignatura): ?>
            <td> <?= $asignatura ?> </td>
            <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>

</table>
</body>
</html>
