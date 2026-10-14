<?php
// Ejercicio 9Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir deberá estar
//almacenada en una variable.

$pesetas = 150.000;
$factor_conversion = 166.386;

$euros = round($pesetas / $factor_conversion, 2); // El 2 es para redondear a dos decimales por los céntimos

echo "$pesetas equivalen a $euros €.";