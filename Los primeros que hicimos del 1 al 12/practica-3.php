<?php //Ejercicio 3 Escribe un programa que muestre por pantalla 10 palabras en inglés junto a su correspondiente
//traducción al castellano. Las palabras deben estar distribuidas en dos columnas. Utiliza la etiqueta
//<table> de HTML.

$diccionario =[
    "Apple" => "Manzana",
    "House" => "Casa",
    "Book" => "Libro",
    "Car" =>"Coche",
    "Dog" => "Perro",
    "Cat" =>"Gato",
    "Sun" => "Sol",
    "Tree" => "Árbol",
    "Water" => "Agua",
    "Computer" => "Ordenador"
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Diccionario</title>
</head>
<body>
    <h2> Diccionario Inglés - Castellano</h2>
    <table border="1">

        <tr>
            <th>Inglés</th>
            <th>Español</th>
        </tr>
        
        <?php foreach ($diccionario as $ingles => $castellano): ?>
            <tr>
                <td> <?php echo $ingles; ?> </td>
                <td> <?php echo $castellano; ?> </td>
            </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>