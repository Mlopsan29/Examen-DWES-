<?php

/**
 * Función auxiliar: digitos
 * Cuenta cuántos dígitos componen el segundo número para calcular
 * el desplazamiento del primero.
 */
function digitos(int $numero): int {
    if ($numero === 0) return 1;
    $numero = abs($numero);
    $contador = 0;
    while ($numero > 0) {
        $numero = intdiv($numero, 10);
        $contador++;
    }
    return $contador;
}

/**
 * Función: juntaNumeros
 * 
 * Concatena dos números enteros para formar uno solo (ej: 45 y 678 -> 45678).
 * 
 * Explicación matemática/algorítmica:
 * 1. Tratamiento del signo:
 *    - Se conserva el signo del primer número ($esNegativo = $num1 < 0).
 *    - Ambos números se pasan a valor absoluto abs() para evitar signos intermedios.
 * 
 * 2. Cálculo del factor de escala:
 *    - Para situar $num1 a la izquierda de $num2, debemos multiplicarlo por 10
 *      elevado al total de dígitos que tiene $num2.
 *      (Ejemplo: juntar 45 y 678 -> 678 tiene 3 cifras -> 45 * 10^3 = 45000).
 *    - Se calcula el multiplicador acumulando potencias de 10 con un bucle for.
 * 
 * 3. Suma final:
 *    - 45000 + 678 = 45678.
 * 4. Restauración del signo:
 *    - Si el primer número era negativo, el número final resultante será negativo.
 *
 * @param int $num1 Primer número entero (irá a la izquierda).
 * @param int $num2 Segundo número entero (irá a la derecha).
 * @return int El número resultante tras unir ambos.
 */
function juntaNumeros(int $num1, int $num2): int {
    $esNegativo = $num1 < 0;
    $num1 = abs($num1);
    $num2 = abs($num2);

    $digitosSegundo = digitos($num2);

    // Calculamos 10 elevado a la cantidad de dígitos del segundo número
    $multiplicador = 1;
    for ($i = 0; $i < $digitosSegundo; $i++) {
        $multiplicador *= 10;
    }

    // Desplazamos el primer número y sumamos el segundo
    $resultado = ($num1 * $multiplicador) + $num2;

    return $esNegativo ? -$resultado : $resultado;
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(juntaNumeros(45, 678));  // int(45678)
// var_dump(juntaNumeros(12, 0));    // int(120)
// var_dump(juntaNumeros(0, 99));    // int(99)
// var_dump(juntaNumeros(-34, 56));  // int(-3456)
// var_dump(juntaNumeros(7, 8));     // int(78)