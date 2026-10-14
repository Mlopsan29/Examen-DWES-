<?php

/**
 * Función: voltea
 * 
 * Invierte el orden de los dígitos de un número entero (ej: 123 -> 321).
 * 
 * Explicación matemática/algorítmica:
 * 1. Preservación del signo:
 *    - Si el número es negativo, se guarda su signo ($esNegativo = true) y se
 *      trabaja con su valor absoluto abs(). Al final se vuelve a aplicar el signo.
 * 
 * 2. Casos directos:
 *    - Si el número tiene un solo dígito (0 al 9), invertido es exactamente el mismo.
 * 
 * 3. Inversión aritmética (sin usar strrev ni strings):
 *    - Extraemos el último dígito con el operador módulo: $digito = $numero % 10.
 *    - Desplazamos a la izquierda los dígitos ya invertidos multiplicando por 10
 *      y sumando el nuevo dígito: $invertido = ($invertido * 10) + $digito.
 *    - Eliminamos el último dígito del número con división entera: $numero = intdiv($numero, 10).
 * 
 * 4. Tratamiento de ceros finales:
 *    - Matemáticamente, si un número termina en cero (ej: 120), su invertido numérico
 *      es 21 (los ceros a la izquierda no tienen valor en un entero).
 *
 * @param int $numero Número entero a invertir.
 * @return int El número con los dígitos invertidos.
 */
function voltea(int $numero): int {
    // Si tiene un solo dígito, se devuelve tal cual
    if (abs($numero) < 10) {
        return $numero;
    }

    $esNegativo = $numero < 0;
    $numero = abs($numero);
    $invertido = 0;

    // Desarmamos el número desde la derecha y lo armamos en $invertido
    while ($numero > 0) {
        $ultimoDigito = $numero % 10;
        $invertido = ($invertido * 10) + $ultimoDigito;
        $numero = intdiv($numero, 10);
    }

    // Restauramos el signo negativo si correspondía
    return $esNegativo ? -$invertido : $invertido;
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(voltea(12345)); // int(54321)
// var_dump(voltea(39));    // int(93)
// var_dump(voltea(-456));  // int(-654)
// var_dump(voltea(1200));  // int(21)
// var_dump(voltea(0));     // int(0)