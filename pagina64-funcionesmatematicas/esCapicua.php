
<?php
 /* esCapicua: Devuelve verdadero si el número que se pasa como parámetro es capicúa y falso en caso
contrario. 

 * Función: esCapicua
 * 
 * Determina si un número entero es capicúa (se lee igual de izquierda a derecha
 * que de derecha a izquierda).
 * 
 * Explicación matemática/algorítmica:
 * 1. Tratamiento del signo: Los números negativos no se consideran capicúas por
 *    el signo '-' o se evalúan en valor absoluto (abs). Aquí usamos abs() para
 *    evaluar la simetría de sus dígitos numéricos.
 * 
 * 2. Inversión aritmética (sin usar funciones de strings):
 *    - Se extrae el último dígito con el operador módulo: $digito = $copia % 10.
 *    - Se desplazan los dígitos del número invertido multiplicando por 10 y sumando el dígito:
 *      $invertido = ($invertido * 10) + $digito.
 *    - Se descarta el último dígito del número original con división entera:
 *      $copia = intdiv($copia, 10).
 * 
 * 3. Comparación final: Si el número invertido es exactamente igual al original,
 *    es capicúa (true); en caso contrario, no lo es (false).
 *
 * @param int $numero Número entero a evaluar.
 * @return bool True si es capicúa, false en caso contrario.
 */


function esCapicua (int $numero): bool {

$numero = abs($numero);
if ($numero < 10) {
    return true;
}
$original = $numero;
$invertido = 0;

while ($numero > 0) {
    $ultimoDigito = $numero % 10;
    $invertido = ($invertido * 10) + $ultimoDigito;
    $numero = intdiv($numero, 10);
}
return $original === $invertido;
}
?>
