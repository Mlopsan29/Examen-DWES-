<?php
//Ejercicio 8 Realiza un conversor de euros a pesetas. La cantidad en euros que se quiere convertir deberá estar
//almacenada en una variable.

$euros = 15;
$factor_conversion = 166.386;

$pesetas = round($euros * $factor_conversion); //round() convierte los decimales al entero mas cercano

echo "$euros € equivalen a $pesetas pesetas.";